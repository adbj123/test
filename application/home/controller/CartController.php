<?php
namespace app\home\controller;

class CartController extends CommonController{
    public function cartList(){
        $cart = new \cart\Cart();
        $cartData = $cart->getCart();

        return $this->fetch('',[
            'cartData'=>$cartData,
        ]);
    }
    //Ajax删除商品
    public function delCartGoods()
    {
        if (request()->isAjax()) {
            if(!session('member_id')){
                $response = ['code'=>-1,'message'=>'请重新登录'];
                echo json_encode($response);die;
            }
            //接收参数
            $goods_id = input('goods_id');
            $goods_attr_ids = input('goods_attr_ids');
            $cart = new \cart\Cart();
            $result = $cart->delCart($goods_id,$goods_attr_ids);
            if($result){
                $response = ['code'=>200,'message'=>'删除成功'];
                echo json_encode($response);die;
            }else{
                $response = ['code'=>-2,'message'=>'删除失败'];
                echo json_encode($response);die;
            }
        }
    }
    //清空购物车
    public function clearCartGoods(){
        if(request()->isAjax()){}
        if(!session('member_id')){
            $response = ['code'=>-1,'message'=>'请重新登录'];
            echo json_encode($response);die;
        }
        $cart = new \cart\Cart();
        $result = $cart->clearCart();
        if($result){
            $response = ['code'=>200,'message'=>'清空成功'];
            echo json_encode($response);die;
        }else{
            $response = ['code'=>-2,'message'=>'清空失败'];
            echo json_encode($response);die;
        }
    }
    //购物车加减数量
    public function changeGoodsNum(){
        if(request()->isAjax()){
            $goods_id=input('goods_id');
            $goods_attr_ids = input('goods_attr_ids');
            $goods_number = input('goods_number');
            //调用购物车对象实现更新数量
            $cart = new \cart\Cart();
            $result = $cart->changeCartNum($goods_id,$goods_attr_ids,$goods_number);
            if($result){
                $response = ['code'=>200,'message'=>'更新成功'];
                echo json_encode($response);die;
            }else{
                $response = ['code'=>-2,'message'=>'更新失败'];
                echo json_encode($response);die;
            }
        }
    }
}