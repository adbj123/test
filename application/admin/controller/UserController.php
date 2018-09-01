<?php
    namespace app\admin\controller;
 //   use think\Controller;
    use app\admin\model\User;
    use app\admin\model\Role;

    class UserController extends CommonController{
        //添加用户
        public function add(){
    /**
     * 1.判断post请求
     * 2.接收post数据
     * 3.验证
     * 4入库
     */
        if(request()->isPost()){
            $postData = input('post.');
            //halt($postData);
            $result = $this->validate($postData,'User.add',[],true);
            if($result !== true){
                $this->error(implode(',',$result));
            }
            $userModel = new User();

            if($userModel->allowField(true)->save($postData)){
                $this->success("添加成功",url("/admin/user/index"));
            }else{
                $this->error("添加失败");
            }
        }
        $roles = Role::select();
        return $this->fetch('',['roles'=>$roles]);
}
        //用户列表页
        public function index(){
            //取出用户的数据
            $userModel = new User();
            //分页
            $usersData = $userModel->order('user_id desc')->paginate(1);
            //$usersData = $userModel->select();
            return $this->fetch('',['usersData'=>$usersData]);
        }
        //删除用户
        public function del(){
            $user_id = input('user_id');
            if(User::destroy($user_id)){
                $this->success('删除成功',url('/admin/user/index'));
            }else{
                $this->error('删除失败');
            }
        }
        //编辑用户
        public function upd(){
            if(request()->isPost()){
                $postData = input('post.');
                if($postData['password'] !='' || $postData['repassword'] !='') {
                    //说明用户需要更新密码
                    $result = $this->validate($postData, 'User.upd', [], true);
                    if ($result !== true) {
                        $this->error(implode(',', $result));
                    }

                }else{
                    $this->error("你没有做任何修改");
                }
                //写入数据库
                $userModel = new User();
                if($userModel->allowField(true)->isUpdate()->save($postData)){
                    $this->success("编辑成功",url("/admin/user/index"));
                }else{
                    $this->error("编辑失败");
                }
            }
            $user_id = input('user_id');
            //获取数据进行回显
            $userModel = new User();
            $userData = $userModel->find($user_id);
            return $this->fetch('',['userData'=>$userData]);
        }
    }
?>
