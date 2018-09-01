<?php
namespace app\home\validate;
use think\Validate;
class Order extends Validate{

    //定义规则
    protected $rule = [
        'receiver' => 'require',
        'address' => 'require',
        'phone' => 'require',
        'zcode' => 'require',

    ];
    //提示信息
    protected $message = [
        'receiver.require' => '收货人必填',
        'address.require' => '地址必填',
        'phone.require' => '手机号必填',
        'zcode.require' => '邮编必填',
    ];

    //验证的场景
    protected $scene = [
        'writeOrderInfo' => ['receiver','address','phone','zcode']
    ];

}