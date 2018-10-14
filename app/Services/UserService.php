<?php

namespace App\Services;

use App\Model\UserModel;
use App\Model\LogModel;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmail;

class UserService
{
    use DispatchesJobs;
    /*
     * 注册
     */
    public function serviceRigster($result)
    {
        //进行邮件发送
        if(isset($result['email'])){
            $this->dispatch(new SendEmail($result['email']));
        }
        $result['username'] = '小米'.microtime(time());
        $result['password'] = md5($result['password']);
        $result['time'] = time();
//        dd($result);
        $loginModel = new UserModel();
        $insert = $loginModel->add($result);
        //注册成功指向登录方法直接登录成功
        $this->serviceLogin($result);

        return $insert;
    }

    /*
     * 用户唯一性
     */
    public function serviceUserUnique($arr)
    {
        $loginModel = new UserModel();
        $unique = $loginModel->userNameUnique($arr);
        if($unique)
        {
            return 3;
        }
    }

    /*
     * 登录
     * return 1登陆成功
     * return 2用户名存在\密码错误
     */
    public function serviceLogin($result)
    {
        $result['password'] = md5($result['password']);
        $model = new UserModel();
        $data= $model->getUserInfoByName($result);
        if(!$data){
            return 2;
        }
        Session()->put('user',$data);
        //Session::put('username',$data);
        $logModel = new LogModel();
        $logCount = $logModel->logSelectModel();

        $log = [
            'username' => Session()->get("user['username']"),
            'request_time' => time(),
            'server_addr' => $_SERVER['SERVER_ADDR'],
            'address' => "北京海淀",
            'http_user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'u_id' => Session()->get("user['u_id']"),
        ];
        if(count($logCount) >= 10) {
            $logModel->logUpdateModel($log,$logCount[0]->id);
        }else{
            $logModel->logInsertModel($log);
        }

        return 1;
    }

}