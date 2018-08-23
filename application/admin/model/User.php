<?php
    namespace app\admin\model;
    use think\Model;
    class User extends Model
    {
        protected $pk = "user_id";
        protected $autoWriteTimestamp = true;

        public static function init()
        {
            //入库前事件
            User::event("before_insert", function ($user) {
                //$user是表单提交过来的当前模型的数据对象
                //$user是即将要写入数据库的数据
                $user['password'] = md5($user['password'] . config('password_salt'));
            });

            //编辑前事件
            User::event('before_update', function ($user) {
                //如果密码为空，删除password字段
                if ($user['password'] == '') {
                    unset($user['password']);
                } else {
                    $user['password'] = md5($user['password'] . config('password_salt'));
                }
            });
        }

        public function checkUser($username, $password)
        {
            $where = [
                'username' => $username,
                'password' => md5($password . config('password_salt'))
            ];
            $userInfo = $this->where($where)->find();
            if ($userInfo) {
                session('username', $userInfo['username']);
                session('user_id', $userInfo['user_id']);
                //1.写入权限到session中（约定开头是私有方法）
                $this->_initAuth($userInfo['role_id']);

                return true;
            } else {
                return false;
            }
        }

        private function _initAuth($role_id)
        {

            //2.根据role_id取出auth_ids_list字段
            $auth_ids_list = Role::where('role_id', '=', $role_id)->value('auth_ids_list');
            //halt($auth_ids_list);
            if ($auth_ids_list == '*') {
                //超级管理员
                $allAuth = Auth::select()->toArray();
            } else {
                //非超级管理员
                $allAuth = Auth::where("auth_id", 'in', $auth_ids_list)->select()->toArray();
            }

            //3.两个技巧整改数据
            $auths = [];
            foreach ($allAuth as $v) {
                $auths[$v['auth_id']] = $v;
            }
            $children = [];
            foreach ($allAuth as $v) {
                $children[$v['pid']][] = $v['auth_id'];
            }
            //把权限写入到session中
            session('auths', $auths);
            session('children', $children);

            //权限防翻墙
            //把角色可访问的权限写入到session中
            if ($auth_ids_list == '*') {
                //超级管理员
                session('visitor', '*');
            } else {
                //非管理员
                $visitor = [];
                //拼接控制器名和方法名成一个字符串放到$visitor数组中
                foreach ($allAuth as $v){
                    $visitor[] = strtolower($v['auth_c'] . '/' . $v['auth_a']);
                    session('visitor',$visitor);
                }

            }
        }
    }
?>
