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
        ];
        if($arr)
        {
            $pregEmail = '/^[A-Za-z0-9]+\@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/';
            $pregPwd = '/^[a-zA-Z\d_\.\/]{8,}$/';
            $pregTel = '/^[\d]{11}$/';
            if (preg_match($pregEmail,$arr['username'])) {
                //用户通过邮箱注册
                echo "用户通过邮箱注册</br>";
            } else if (preg_match($pregTel,$arr['username'])) {
                //用户通过手机号码注册
                echo "用户通过手机号码注册</br>";
            } else {
                return "手机号或邮箱注册</br>";
            }
            $service = new LoginService();
            $res = $service->s_rigster($arr);

            if($res == 2)
            {
                return "此用户已注册";
            } else {
                return "注册成功";
            }
        }else{
            return "不符合条件";
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

        if($res == 1) {
            return "登录成功";
        }
        if($res == 2){
            return "登录失败";
        }
        if($res == 3) {
            return "密码错误";
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