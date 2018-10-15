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

Route::get('/', 'Index\IndexController@index');

Route::get('/php',function(){
    phpinfo();
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
Route::post('user/registerDo','Index\UserController@registerDo');
//登录
Route::get('user/login','Index\UserController@login');
//处理登录
Route::post('user/loginDo','Index\UserController@loginDo');
//退出登录
Route::get('user/loginOut','Index\UserController@loginOut');
//登录日志
Route::get('user/loginLog','Index\UserController@loginLog');

//个人中心
Route::get('user/selfInfo','Index\UserController@selfInfo');


/*
 * 跳转提示路由
 */
Route::resource('/prompt','PromptController');