<?php
    namespace app\admin\controller;
    use app\admin\model\Auth;
    class AuthController extends CommonController{
        public function add(){
            //接收提交数据
            if(request()->isPost()){
                $postData = input('post.');
                //若是顶级权限pid=0,只验证exceptCA场景
                if($postData['pid'] == 0){
                    $result = $this->validate($postData,'Auth.exceptCA',[],true);
                }else{
                    $result = $this->validate($postData,'Auth.add',[],true);
                }
                if($result !== true){
                    $this->error(implode(',',$result));
                }
                $authModel = new Auth();

                if($authModel->save($postData)){
                    $this->success("添加成功",url("/admin/auth/index"));
                }else{
                    $this->error("添加失败");
                }
            }

            //取出无极限分类的权限数据
            $authModel = new Auth();
            $oldAuth = $authModel->select()->toArray();
            $auths = $authModel->getSonsAuth($oldAuth);
            return $this->fetch('',[
                'auths'=>$auths
            ]);
        }
        public function index(){
            //获取权限数据，分配模版
            $oldauths = Auth::alias('t1')
                ->field('t1.*,t2.auth_name as p_name')
                ->join('sh_auth t2','t1.pid = t2.auth_id','left')
                ->select()
                ->toArray();
            //无极限处理
            $authModel = new Auth();
            $authsData = $authModel->getSonsAuth($oldauths);
            return $this->fetch('',['authsData'=>$authsData]);
        }
        public function upd(){
            if(request()->isPost()){
                $postData = input('post.');
                if($postData['pid'] == 0){
                    $result = $this->validate($postData,'Auth.exceptCA',[],true);
                }else{
                    $result = $this->validate($postData,'Auth.upd',[],true);
                }

                $authModel = new Auth();
                if($authModel->isUpdate()->save($postData)){
                    $this->success("编辑成功",url("/admin/auth/index"));
                }else{
                    $this->error("编辑失败");
                }
            }
            //获取数据进行回显
            $auth_id = input('auth_id');
            $authModel = new Auth();
            $authData = $authModel->find($auth_id);
            //无极限处理
            $oldauths = $authModel->select()->toArray();
            $auths = $authModel->getSonsAuth($oldauths);
            return $this->fetch('',
                ['authData'=>$authData,'auths'=>$auths]);
        }
    }
?>
