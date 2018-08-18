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
});
?>