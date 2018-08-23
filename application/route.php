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
Route::get('/','admin/index/index');
Route::get('admin/index/index','admin/index/index');

//后台路由分组
Route::group('admin',function (){    //后台首页相关路由
    Route::get('/index/top','admin/index/top');
    Route::get('/index/left','admin/index/left');
    Route::get('/index/main','admin/index/main');
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
});
?>