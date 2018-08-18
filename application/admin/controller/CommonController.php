<?php
    namespace app\admin\controller;
    use think\Controller;

    class CommonController extends Controller{
        public function _initialize(){
            //判断是否存在session
            if(!session('user_id')){
                $this->redirect('/admin/public/login');
            }
        }
    }
?>
