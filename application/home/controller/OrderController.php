<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use app\home\model\Order;
class OrderController extends Controller{
    //订单展示
    public function orderInfo(){
        //获取购物车数据分配到模板中
        if(!session('member_id')){
            $this->error("请先登录");
        }
        //取出购物车商品信息分配到模板中
        $cart =  new \cart\Cart();
        $cartData = $cart->getCart();
        if(!$cartData){
            $this->error("请添加商品到购物车");
        }
        return $this->fetch('',[
            'cartData' => $cartData
        ]);
    }
    //订单处理
    public function writeOrderInfo(){
        if(!session('member_id')){
            $this->error("请先登录");
        }
        //接收收货人信息
        $postData = input('post.');
        //验证器验证
        $result = $this->validate($postData,'Order.writeOrderInfo',[],true);
        if($result !== true){
            $this->error(implode(',',$result));
        }
        //生成唯一订单号
        $order_id = date('ymdhis').time().uniqid();
        $member_id = session('member_id');
        //获取订单总金额
        $cart = new \cart\Cart();
        $cartData = $cart->getCart();
        if(!$cartData){
            $this->error('购物车为空',url('/'));
        }
        $total_price = 0;
        foreach ($cartData as $v){
            $total_price += ($v['goodsInfo']['goods_price']+$v['attr']['attrTotalPrice'])*$v['goods_number'];
        }
        //开始开启事务，进行入库
        Db::startTrans();
        try{
            //1.先入库到订单表，准备订单入库的数据
            $postData['order_id']=$order_id;
            $postData['total_price']=$total_price;
            $postData['member_id']=$member_id;
            $order_result = Order::create($postData);
            if(!$order_result){
                throw new \Exception('订单表入库失败');
            }
            //只有订单表入库成功，才入库订单商品表，同时要减去商品的对应的库存数量
            foreach ($cartData as $v){
                $goods_price = ($v['goodsInfo']['goods_price']+$v['attr']['attrTotalPrice'])*$v['goods_number'];
                $orderGoodsData=[
                    'order_id'=>$order_id,
                    'goods_id'=>$v['goods_attr_ids'],
                    'goods_attr_ids'=>$v['goods_number'],
                    'goods_price'=>$goods_price,
                ];
                $order_goods_result = Db::name('order_goods')->insert($orderGoodsData);
                //同时要减去商品的对应的库存数量，防止库存超卖
                $where = [
                        'goods_id'=>$v['goods_id'],
                        'goods_number'=>['>=',$v['goods_number']]
                ];
                //执行商品表的更新操作
                $goods_result = Db::name('goods')->where($where)->setDec('goods_number',$v['goods_number']);
                //只有订单商品表和商品表库存同时成功，才进行下一次循环，其中一个失败抛出异常
                if(!$order_goods_result || !$goods_result){
                    throw new \Exception('订单上品表入库失败或库存不够');
                }
                //成功后清空购物车
                $cart->clearCart();
                //提交事务
                Db::commit();
            }
        }catch (\Exception $e){
            //只有try中抛出异常才会执行这里的代码
            Db::rollback();
            //提示上面的抛出的错误信息
            $this->error($e->getMessage());
        }
        //唤起支付宝支付
        $this->_payOrder($order_id,$total_price);
    }
    //模拟表单提交
    private function _payOrder($order_id,$total_price,$title='支付标题',$boby="支付描述"){
        $url = url('/home/order/payMoney');
        echo <<<eof
            <form action="$url" method='post' id="payForm">
                <input type='hidden' name='WIDout_trade_no' value="$order_id">
                <input type='hidden' name='WIDsubject' value="$title">
                <input type='hidden' name='WIDtotal_amount' value="$total_price">
                <input type='hidden' name='WIDbody' value="$boby">
            </form>
            <script>
                document.getElementById('payForm').submit();
            </script>

eof;
    }
//    调用支付宝支付文件
    public function payMoney(){
        //直接包含支付宝支付的文件pagepay/pagepay.php即可
        include "../extend/alipay/pagepay/pagepay.php";
    }
    //接收支付宝支付完成返回的数据
    public function return_url(){
        require_once("../extend/alipay/config.php");
        require_once '../extend/alipay/pagepay/service/AlipayTradeService.php';
        $arr=input('get.');
        $alipaySevice = new \AlipayTradeService($config);
        $result = $alipaySevice->check($arr);
        if($result) {
            //验证成功
            //商户订单号(当前网站的订单号)
            $out_trade_no = htmlspecialchars($arr['out_trade_no']);
            //支付宝交易号流水号
            $trade_no = htmlspecialchars($arr['trade_no']);

            //定义更新的数据，支付成功更新用户的订单状态（未付款0->已付款1）
            $data = [
                'pay_status' => 1,
                'ali_order_id' => $trade_no
            ];
            //更新操作
            $orderModel = new Order();
            //根据返回来的订单号来更新
            $orderModel->where('order_id','=',$out_trade_no)->update($data);
            return $this->fetch();
        }
        else {
            //验证失败
            echo "验证失败";
        }
    }
    //支付宝支付成功以post方式异步通知
    public function notify_url(){
        require_once("../extend/alipay/config.php");
        require_once '../extend/alipay/pagepay/service/AlipayTradeService.php';
        $arr=input('post.');
        $alipaySevice = new \AlipayTradeService($config);
        $result = $alipaySevice->check($arr);
        if($result) {
            //验证成功
            //商户订单号(当前网站的订单号)
            $out_trade_no = htmlspecialchars($arr['out_trade_no']);
            //支付宝交易号流水号
            $trade_no = htmlspecialchars($arr['trade_no']);

            //定义更新的数据，支付成功更新用户的订单状态（未付款0->已付款1）
            $data = [
                'pay_status' => 1,
                'ali_order_id' => $trade_no
            ];
            //更新操作
            $orderModel = new Order();
            //根据返回来的订单号来更新
            $orderModel->where('order_id','=',$out_trade_no)->update($data);
            echo 'success';
        }
        else {
            //验证失败
            echo "验证失败";
        }
    }
    public function selfOrder(){
        $member_id=session('member_id');
        if(!$member_id){
            $this->error("请先登录");
        }
        $orderData = Order::where('member_id','=',$member_id)->select();
        return $this->fetch('',[
           'orderData'=>$orderData
        ]);
    }
    //订单支付
    public function selfPay(){
        $id = input('id');
        //获取order_id和total_price总金额
        $order = Order::find($id);
        //调用支付的方法
        $this->_payOrder($order['order_id'],$order['total_price']);
    }
}