<?php
/**
 * Created by PhpStorm.
 * User: Adon
 * Date: 2018/9/28
 * Time: 19:09
 */

namespace App\Http\Controllers\Index;

use DB;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Session;

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
    public function registerDo(Request $request)
    {
        $sign = $request->post();
        $validated = $this->validate($request,[
            //用户名的唯一性
            'username' => 'required | unique:user,username',
//            //邮箱
//            'email' => ['unique:user,email','regex:/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/'],
//            //mobile
//            'mobile' => ['unique:user,mobile','regex:/^1[3-8]{2}[0-9]{8}$/'],
            //密码
            'password' => 'required | min:6 ',
            //验证码是否正确
            'verificode' => 'required | captcha',
        ]);
        if($validated) {
            if($sign) {
                $service = new UserService();
                $emailPreg = "/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/";
                $mobilePreg = "/^1[3-9]{2}[0-9]{8}$/";
                $arr=[];
                if(preg_match($mobilePreg,$sign['username'])){
                    $arr['mobile'] = $sign['username'];
                }elseif (preg_match($emailPreg,$sign['username'])){
                    $arr['email'] = $sign['username'];
                }
                $arr['password'] = $sign['password'];
                $result = $service->serviceRigster($arr);
                if($result) {
                    return redirect('/prompt')->with([
                        'message'=>'注册成功！',
                        'url' =>'index/index',
                        'jumpTime'=>3,
                        'status'=>true
                    ]);
                } else {
                    return redirect('/prompt')->with([
                        'message'=>'注册失败！',
                        'url' =>'user/register',
                        'jumpTime'=>3,
                        'status'=>false
                    ]);
                }
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
    public function loginDo(Request $request)
    {
        $sign = $request->post();
        $validated = $this->validate($request,[
            'verificode' => 'required|captcha',
        ]);
        if($validated) {
            $arr=[];
            $emailPreg = "/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/";
            $mobilePreg = "/^1[3-9]{2}[0-9]{8}$/";
            if(preg_match($mobilePreg,$sign['username'])){
                $arr['mobile'] = $sign['username'];
            }elseif (preg_match($emailPreg,$sign['username'])){
                $arr['email'] = $sign['username'];
            }
            $arr['password'] = $sign['password'];
            $service = new UserService();
            $result = $service->serviceLogin($arr);
            if($result == 1) {
                return redirect('/prompt')->with([
                    'message'=>'登录成功！',
                    'url' =>'index/index',
                    'jumpTime'=>3,
                    'status'=>true
                ]);
            } else {
                return redirect('/prompt')->with([
                    'message'=>'用户名/密码错误！',
                    'url' =>'user/login',
                    'jumpTime'=>3,
                    'status'=>false
                ]);
            }
        }

    }

    /*
     * 退出登录
     */
    public function loginOut()
    {
        session()->forget('user');
        return redirect('/prompt')->with([
            'message'=>'退出成功！',
            'url' =>'user/login',
            'jumpTime'=>3,
            'status'=>true
        ]);
    }

    /*
     * login日志
     */
//    public function loginLog()
//    {
//        $loginLog =  DB::table('user_insert_log')->get()->toarray();
//
//        return view('frontend/user/login_log',['data'=>$loginLog]);
//    }

    /*
     * 个人中心
     */
    public  function selfInfo()
    {
        return view('frontend/user/selfInfo');
    }


}