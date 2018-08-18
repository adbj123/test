<?php
    namespace app\admin\controller;
    use app\admin\model\Auth;
    class AuthController extends CommonController{
        public function add(){
            //取出无极限分类的权限数据
            $authModel = new Auth();
            $oldAuth = $authModel->select()->toArray();
            $auths = $authModel->getSonsAuth($oldAuth);
            return $this->fetch('',[
                'auths'=>$auths
            ]);
        }
    }
?>
