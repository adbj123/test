<?php
    namespace app\home\validate;
    use think\Validate;
    class Member extends Validate{
        //定义规则
        protected $rule = [
          'username'=>'require|unique:member',
            'password'=>'require',
            'repassword'=>'require|confirm:password',
            'email'=>'require|email|unique:member',
            //验证码
            'captcha'=>"require|captcha:1",
            'login_captcha'=>"require|captcha:2",
            'phone'=>'require|unique:member|regex:^1[3-8]\d{9}$'
        ];
        //提示信息
        protected $message = [
            'username.require' => '用户名必填',
            'username.unique' => '用户名已存在',
            'password.require'  => '密码必填',
            'repassword.require'  => '确认密码必填',
            'repassword.confirm'  => '两次密码不一致',
            'email.require' => '邮箱必填',
            'email.email' => '邮箱格式非法',
            'email.unique' => '邮箱已存在',
            'captcha.require' => '验证码必填',
            'captcha.captcha' => '验证码输入错误',
            'login_captcha.require' => '验证必填',
            'login_captcha.captcha' => '验证码输入错误',
            'phone.require'=> '手机号必填',
            'phone.regex'=> '手机号格式有误',
            'phone.unique'=> '手机号已存在',
        ];

        //验证的场景
        protected $scene = [
            'register' => ['username','password','repassword','email','captcha','phone'],
            //只验证username元素的require规则
            'login' =>['username'=>"require",'password','login_captcha'],
            //发送邮件重置密码验证
            'change' =>['password','repassword'],
        ];
    }
?>
