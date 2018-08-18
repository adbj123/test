<?php
    namespace app\admin\controller;
    use think\Controller;
    use app\admin\model\User;
    class PublicController extends Controller{
        public function login(){
            /**
             * 1.判断是否post请求
             * 2.接收post参数
             * 3.验证器验证
             * 4.判断用户名密码是否正确
             */
            if(request()->isPost()){
                $postData = input('post.');
                //dump($postData);
                $result = $this->validate($postData,'User.login',[],true);
                if($result !== true){
                    $this->error(implode(',',$result));
                }
                //判断用户名是否匹配
                $userModel = new User();
                $status = $userModel->checkUser($postData['username'],$postData['password']);
                if($status){
                    //halt(session('username'));
                    $this->redirect('/admin/index/index');
                }else{
                    $this->error('用户名或密码错误');
                }
            }
            return $this->fetch();
        }

        public function logout(){
            //清楚session
            session('username',null);
            session('user_id',null);
            //重定向到登陆页
            $this->redirect('/admin/public/login');
        }
    }
?>
