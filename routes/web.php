<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	// echo date("Y-m-d H:i:s");
 	return view('welcome');
    // echo Config::get('app.timezone');
    // Config::set('app.locale','cn');
    // echo Config::get('app.locale');
    // echo env('DB_HOST');
});

//模板继承的联系  搭建后台
Route::resource("/admin","Admin\AdminController");

//后台的会员模块(模型类)
Route::resource("/adminusers","Admin\UsersController");

//会员收货地址模块(模型)
Route::get("/adminaddress/{id}","Admin\UsersController@address");

//自定义函数
Route::get("/a","Admin\UsersController@a");

//自定义类
Route::get("/b","Admin\UsersController@xxoo");

//支付宝接口调用
Route::get("/d","Admin\UsersController@d");

//支付宝接口调用 最后返回的界面
Route::get("/returnurl","Admin\UsersController@returnurl");