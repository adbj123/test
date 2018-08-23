<?php
namespace app\admin\validate;
use think\Validate;
class Type extends Validate{

    //定义规则
    protected $rule = [
        'type_name' => 'require|unique:type',
    ];

    //提示信息
    protected $message = [
        'type_name.require' => '商品类型名称必填',
        'type_name.unique' => '商品类型名称存在',
    ];

    //验证的场景
    protected $scene = [
        'add' => ['type_name'],
        'upd' => ['type_name'],
    ];

}
