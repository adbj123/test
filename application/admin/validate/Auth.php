<?php
namespace app\admin\validate;
use think\Validate;
class Auth extends Validate{
    //定义规则
    protected $rule = [
        'auth_name'=>'require|unique:auth',
        'pid'=>'require',
        'auth_c'=>'require',
        'auth_a'=>'require',
    ];
    //提示信息
    protected $message = [
        'auth_name.require' => '权限名不能为空',
        'auth_name.unique' => '权限名已经存在',
        'pid.require'=>'请选择一个权限',
        'auth_c.require'=>'控制器名不能为空',
        'auth_a.require'=>'方法名不能为空',
    ];
    //验证场景
    protected $scene = [
        'add'=>['auth_name','pid','auth_c','auth_a'],
        'upd'=>['auth_name','pid','auth_c','auth_a'],
        'exceptCA'=>['auth_name','pid'],

    ];
}
?>
