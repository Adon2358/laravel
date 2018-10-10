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
use App\Services\LoginService;
use Illuminate\Http\Request;
use Session;
use App\Jobs\SendEmail;

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
            'username' => 'unique:user,username',
            //验证码是否正确
            'verificode' => 'required | captcha',
        ]);
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
                $result = $service->serviceRigster($arr);

                if($result) {

                    //验证是否是邮箱注册，进行邮件发送
                    if(preg_match($pregEmail,$sign['username'])){
                        $this->dispatch(new SendEmail($sign['username']));
                    }

                    return redirect('/prompt')->with([
                        'message'=>'注册成功！',
                        'url' =>'user/login',
                        'jumpTime'=>3,
                        'status'=>false
                    ]);
                } else {
                    return redirect('/prompt')->with([
                        'message'=>'注册失败！',
                        'url' =>'user/register',
                        'jumpTime'=>3,
                        'status'=>true]);
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
    public  function loginDo(Request $request)
    {
        $sign = $request->post();
        $validated = $this->validate($request,[
            'verificode' => 'required|captcha',
        ]);
        if($validated) {
            $arr = [
                'username' => $sign['username'],
                'password' => $sign['password'],
            ];
            $service = new LoginService();
            $result = $service->serviceLogin($arr);
//            var_dump($result);die;
            if($result == 1) {
                return redirect('/prompt')->with([
                    'message'=>'登录成功！',
                    'url' =>'index/index',
                    'jumpTime'=>3,
                    'status'=>true
                ]);
            }
            if($result == 2){
                return redirect('/prompt')->with([
                    'message'=>'登录失败！',
                    'url' =>'user/login',
                    'jumpTime'=>3,
                    'status'=>false
                ]);
            }
            if($result == 3) {
                return redirect('/prompt')->with([
                    'message'=>'密码错误！',
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
        session()->forget('username');
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