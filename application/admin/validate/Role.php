<?php
namespace app\admin\validate;
use think\Validate;
class Role extends Validate{
    //定义规则
    protected $rule = [
        'role_name'=>'require|unique:role',

    ];
    //提示信息
    protected $message = [
        'role_name.require' => '角色名称不能为空',
        'role_name.unique' => '角色名称已经存在',
    ];
    //验证场景
    protected $scene = [
        'add'=>['role_name'],
        'upd'=>['role_name']
    ];
}
?>
