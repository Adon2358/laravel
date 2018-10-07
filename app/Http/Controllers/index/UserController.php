<?php
/**
 * Created by PhpStorm.
 * User: Adon
 * Date: 2018/9/28
 * Time: 19:09
 */
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Service\LoginService;
use Illuminate\Http\Request;

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
     * 处理注册
     */
    public function registerdo(Request $request)
    {
        $sign = $request->post();
        $arr = [
            'username' => $sign['username'],
            'password' => $sign['password'],
            'repassword' => $sign['repassword'],
            'mobile' => $sign['mobile'],
        ];
        $service = new LoginService();
        $res = $service->s_rigster($arr);

        if($res == 2)
        {
            return "此用户已注册";
        } else {
            return "注册成功";
        }
    }
    /*
     * 登录
     */
    public  function login()
    {
        return view('frontend/user/login');
    }
    /*
     * 处理登录
     */
    public  function logindo(Request $request)
    {
        $sign = $request->post();
        $arr = [
            'username' => $sign['username'],
            'password' => $sign['password'],
        ];
        $service = new LoginService();
        $res = $service->s_login($arr);

        if($res == 1)
        {
            return "登录成功";
        } else {
            return "登录失败";
        }
    }
    /*
     * 个人中心
     */
    public  function self_info()
    {
        return view('frontend/user/self_info');
    }


}