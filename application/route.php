<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
    //引入路由类
    use think\Route;

//默认网站首页
Route::get('/','/home/index/index');
Route::get('admin/index/index','admin/index/index');
//Route::get('/home','home/index/index');
Route::get('home/index/index','home/index/index');
Route::get('public/alipay/index','public/alipay/index');

//前台路由分组
Route::group('home',function (){
    Route::any('/public/register','home/public/register');
    Route::any('/public/login','home/public/login');
    Route::any('/public/logout','home/public/logout');
    //短信验证码
    Route::any('/public/logout','home/public/logout');
    Route::any('/public/sendSms','home/public/sendSms');
    //QQ登陆
    Route::any('/member/qqlogin','home/member/qqlogin');
    Route::any('/member/qqcallback','home/member/qqcallback');

    //邮箱验证，忘记密码
    Route::any('/public/forgetPassword','home/public/forgetPassword');
    Route::any('/public/sendEmail','home/public/sendEmail');
    Route::any('/public/change/:member_id/:hash/:time','home/public/change');
    //前台分类列表页
    Route::any('/category/index','home/category/index');
    //前台商品详情页
    Route::any('/goods/detail','home/goods/detail');
    //加入到购物车的路由
    Route::any('/goods/addGoodsToCart','home/goods/addGoodsToCart');
    Route::any('/cart/cartlist','home/cart/cartlist');
    //购物车删除商品
    Route::any('/cart/delCartGoods','home/cart/delCartGoods');
    Route::any('/cart/clearCartGoods','home/cart/clearCartGoods');
    Route::any('/cart/changeGoodsNum','home/cart/changeGoodsNum');
    //商品订单页
    Route::any('/order/orderInfo','home/order/orderInfo');
    Route::any('/order/writeOrderInfo','home/order/writeOrderInfo');
    Route::any('/order/writeOrderInfo','home/order/writeOrderInfo');
    Route::any('/order/selfOrder','home/order/selfOrder');
    //支付宝跳转地址
    Route::any('/order/notify_url','home/order/notify_url');
    Route::any('/order/return_url','home/order/return_url');
    //支付宝支付的路由
    Route::any('/order/payMoney','home/order/payMoney');
    Route::any('/order/selfPay','home/order/selfPay');


});
//后台路由分组
Route::group('admin',function (){    //后台首页相关路由
    Route::get('/index/top','admin/index/top');
    Route::get('/index/left','admin/index/left');
    Route::get('/index/main','admin/index/main');
    Route::get('/public/logout','admin/public/logout');
    //后台用户路由
    Route::any('/user/index','admin/user/index');
    Route::any('/user/add','admin/user/add');
    Route::any('/user/del','admin/user/del');
    Route::any('/user/upd','admin/user/upd');
    //后台用户登录路由
    Route::any('/public/login','admin/public/login');
    //后台权限管理模块
    Route::any('/auth/add','admin/auth/add');
    Route::any('/auth/index','admin/auth/index');
    Route::any('/auth/upd','admin/auth/upd');
    //后台角色管理
    Route::any('/role/upd','admin/role/upd');
    Route::any('/role/add','admin/role/add');
    Route::any('/role/index','admin/role/index');
    Route::any('/role/del','admin/role/del');
    //后台商品类型管理
    Route::any('/type/upd','admin/type/upd');
    Route::any('/type/add','admin/type/add');
    Route::any('/type/index','admin/type/index');
    Route::any('/type/del','admin/type/del');
    //后台商品分类管理
    Route::any('/category/upd','admin/category/upd');
    Route::any('/category/add','admin/category/add');
    Route::any('/category/index','admin/category/index');
    Route::any('/category/del','admin/category/del');
    //后台商品属性管理
    Route::any('/Attribute/upd','admin/Attribute/upd');
    Route::any('/Attribute/add','admin/Attribute/add');
    Route::any('/Attribute/index','admin/Attribute/index');
    Route::any('/Attribute/del','admin/Attribute/del');
    //商品有关的相关路由
    Route::any('/category/del','admin/category/del');
    Route::any('/Goods/add','admin/Goods/add');
    Route::any('/goods/getTypeAttr','admin/goods/getTypeAttr');
    Route::any('/goods/index','admin/goods/index');
    //后台订单页
    Route::any('/order/index','admin/order/index');
    //设置后台订单的物流信息的路由
    Route::any('/Order/setWuliu','admin/order/setWuliu');
    //查询后台订单的物流信息的路由
    Route::any('/Order/getWuliu','admin/order/getWuliu');
});
?>