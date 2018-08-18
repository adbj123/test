<?php
    namespace app\admin\model;
    use think\Model;
    class User extends Model{
        protected $pk = "user_id";
        protected $autoWriteTimestamp = true;

        public static function init(){
            //入库前事件
            User::event("before_insert",function($user){
               //$user是表单提交过来的当前模型的数据对象
                //$user是即将要写入数据库的数据
                $user['password'] = md5($user['password'] . config('password_salt'));
            });

            //编辑前事件
            User::event('before_update',function($user){
               //如果密码为空，删除password字段
                if($user['password']==''){
                    unset($user['password']);
                }else{
                    $user['password'] = md5($user['password'] . config('password_salt'));
                }
            });
        }

        public function checkUser($username,$password){
            $where = [
              'username' => $username,
                'password'=>md5($password.config('password_salt'))
            ];
            $userInfo = $this->where($where)->find();
            if($userInfo){
                session('username',$userInfo['username']);
                session('user_id',$userInfo['user_id']);
                return true;
            }else{
                return false;
            }
        }
}
?>
