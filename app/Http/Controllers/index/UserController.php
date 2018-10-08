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
use Session;

class UserController extends  Controller
{

    /*
     * 验证码调用
     */
    public function Captcha(Request $request)
    {
        $validated = $this->validate($request,[
            'verificode' => 'required|captcha',
        ]);

        return $validated;
    }

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
        $validated = $this->Captcha($request);
        if($validated) {
            $arr = [
                'username' => $sign['username'],
                'password' => $sign['password'],
                'repassword' => $sign['repassword'],
            ];
            if($arr) {
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
                $arr['pregEmail'] = $pregEmail;
                $service = new LoginService();
                $res = $service->s_rigster($arr);

                if($res == 2) {
                    return redirect('/prompt')->with(['message'=>'此用户已注册！','url' =>'user/register', 'jumpTime'=>3,'status'=>false]);
                } else {
                    return redirect('/prompt')->with(['message'=>'注册成功！','url' =>'user/login', 'jumpTime'=>3,'status'=>true]);
                }
            }else{
                return redirect('/prompt')->with(['message'=>'不符合条件！','url' =>'user/register', 'jumpTime'=>3,'status'=>false]);
            }
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
        $validated = $this->Captcha($request);
        if($validated) {
            $arr = [
                'username' => $sign['username'],
                'password' => $sign['password'],
            ];
            $service = new LoginService();
            $res = $service->s_login($arr);

            if($res == 1) {
                Session()->put('username',$sign['username']);
                return redirect('/prompt')->with(['message'=>'登录成功！','url' =>'index/index', 'jumpTime'=>3,'status'=>true]);
            }
            if($res == 2){
                return redirect('/prompt')->with(['message'=>'登录失败！','url' =>'user/login', 'jumpTime'=>3,'status'=>false]);
            }
            if($res == 3) {
                return "密码错误";
            }
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