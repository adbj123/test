<?php
    namespace app\admin\controller;
    use app\admin\model\Order;
    class OrderController extends CommonController{
        public function index(){
            //取出所有订单
            $orderData = Order::select();
            return $this->fetch('',[
               'orderData'=>$orderData
            ]);
        }

        public function setWuliu(){
            if(request()->isPost()){
                $postData =input('post.');
                $postData['send_status']=1;
                $orderMode = new Order();
                if($orderMode->update($postData)){
                    $this->success("分配物流成功",url("/admin/order/index"));
                }else{
                    $this->error("分配物流失败");
                }
            }
            $id = input('id');
            $orderData = Order::find($id);
            return $this->fetch('',[
               'orderData'=>$orderData
            ]);
        }
        //获取物流信息
        public function getWuliu(){
            if(request()->isAjax()){
                $company = input('company');
                $number = input('number');
                $url = "http://www.kuaidi100.com/applyurl?key=9d37bc6b0a41e6fe&com={$company}&nu={$number}&show=0";
                //使用file_get_content模拟get请求
                echo file_get_contents($url);
            }
        }
    }
?>