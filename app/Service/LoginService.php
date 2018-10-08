<?php
namespace App\Service;

use App\Model\LoginModel;
use Illuminate\Support\Facades\Mail;

class LoginService
{

    /*
     * 注册
     */
    public function s_rigster($res)
    {
        //验证是否是邮箱注册，进行邮件发送
        if(preg_match($res['pregEmail'],$res['username'])){
            $data = ['email'=>$res['username']];
            Mail::send('emails/reminder', $data, function($message) use($data)
            {
                $message->to($data['email'])->subject('欢迎注册我们的网站!');
            });
        }
        unset($res['pregEmail']);
        $model = new LoginModel();
        $ins = $model->m_rigster($res);

        return $ins;
    }
    /*
     * 登录
     */
    public function s_login($res)
    {
        $model = new LoginModel();
        $log = $model->m_login($res);

        return $log;
    }

}