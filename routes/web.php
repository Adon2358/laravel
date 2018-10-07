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
    return view('welcome');
});
/*
 * IndexController
 */
//首页
Route::get('index/index','Index\IndexController@index');
//列表
Route::get('index/list','Index\IndexController@list');
//详情页
Route::get('index/details','Index\IndexController@details');

/*
 * CartController
 */
//购物车
Route::get('cart/cart','Index\CartController@cart');
//订单
Route::get('cart/order','Index\CartController@order');

/*
 * UserController
 */
//注册
Route::get('user/register','Index\UserController@register');
//处理注册
Route::post('user/registerdo','Index\UserController@registerdo');
//登录
Route::get('user/login','Index\UserController@login');
//处理登录
Route::post('user/logindo','Index\UserController@logindo');
//个人中心
Route::get('user/self_info','Index\UserController@self_info');

/*
 * LoginController
 */
//注册
Route::get('login/register','Index\LoginController@register');
//处理注册
Route::post('login/registerdo','Index\LoginController@registerdo');