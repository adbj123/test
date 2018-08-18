<?php
    namespace app\admin\validate;
    use think\Validate;
    class User extends Validate{
        //定义规则
        protected $rule = [
          'username'=>'require|unique:user|min:4',
            'password'=>'require',
            'repassword'=>'require|confirm:password',
        ];
        //提示信息
        protected $message = [
            'username.require' =>'用户名不能为空',
            'username.unique' =>'用户名已经存在',
            'username.min' =>'用户名至少4位',
            'password.require'=>'密码不能为空',
            'repassword.require'=>'确认密码不能为空',
            'repassword.confirm'=>'两次密码不一致',
        ];
        //验证场景
        protected $scene = [
            'add'=>['username','password','repassword']
        ];
    }
?>
