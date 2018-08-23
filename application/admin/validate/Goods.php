<?php
namespace app\admin\validate;
use think\Validate;
class Goods extends Validate{

    //定义规则
    protected $rule = [
        'goods_name' => 'require|unique:goods',
        'goods_price'  => 'require|gt:0',
        //'goods_number'  => 'require|egt:0', //库存大于或等于0
        //默认正则含有^正则$,包含^和$
        'goods_number'  => 'require|regex:^\d+$', //库存大于或等于0
        'cat_id'  => 'require',
    ];
    //提示信息
    protected $message = [
        'goods_name.require' => '商品名称必填',
        'goods_name.unique' => '商品名称存在',
        'goods_price.require' => '价格必填',
        'goods_price.gt' => '价格要大于0',
        'goods_number.require' => '库存必填',
        //'goods_number.egt' => '库存大于或等于0',
        'goods_number.regex' => '库存大于或等于0',
        'cat_id.require' => '必须选择分类',
    ];

    //验证的场景
    protected $scene = [
        'add' => ['goods_name','goods_price','goods_number','cat_id'],
    ];

}

