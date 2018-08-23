<?php
    namespace app\admin\controller;
    use think\Controller;

    class CommonController extends Controller{
        public function _initialize(){
            //判断是否存在session
            if(!session('user_id')){
                $this->redirect('/admin/public/login');
            }else{
                //已经登陆，但存在权限翻墙的可能
                $now_c = request()->controller();
                $now_a = request()->action();
                $now_ca = strtolower($now_c . '/' . $now_a);

                //取出当前角色可访问的权限
                $visitor =session('visitor');
                if($visitor == '*' || strtolower($now_c ) == 'index'){
                    return;
                }
                //非超级
//                if(!in_array($now_ca,$visitor)){
//                    $this->redirect('/admin/index/index');
 //               }
            }
        }
    }
?>
