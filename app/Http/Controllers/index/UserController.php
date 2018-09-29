<?php
/**
 * Created by PhpStorm.
 * User: Adon
 * Date: 2018/9/28
 * Time: 19:09
 */
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

class UserController extends  Controller
{

    /*
     * 注册
     */
    public  function register()
    {
        return view('frontend/user/register');
    }
    /*
     * 登录
     */
    public  function login()
    {
        return view('frontend/user/login');
    }
    /*
     * 个人中心
     */
    public  function self_info()
    {
        return view('frontend/user/self_info');
    }
    public function demo()
    {
        return ('hello word! adon');
    }

}