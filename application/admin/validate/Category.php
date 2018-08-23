<?php
namespace app\admin\validate;
use think\Validate;
class Category extends Validate{

    //定义规则
    protected $rule = [
        'cat_name' => 'require|unique:category',
        'pid'  => 'require',
    ];
    //提示信息
    protected $message = [
        'cat_name.require' => '分类名称必填',
        'cat_name.unique' => '分类名称存在',
        'pid.require' => '请选择分类',
    ];

    //验证的场景
    protected $scene = [
        'add' => ['cat_name','pid'],
    ];

}