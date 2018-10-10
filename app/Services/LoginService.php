<?php
namespace App\Services;

use App\Model\LoginModel;
use App\Model\LogModel;
use Illuminate\Support\Facades\Mail;

class LoginService
{

    /*
     * 注册
     */
    public function serviceRigster($result)
    {

        $preEmail = $result['pregEmail'];
        unset($result['pregEmail']);
        $result['password'] = md5($result['password']);
        $loginModel = new LoginModel();
        $insert = $loginModel->registerModel($result);

        return $insert;
    }
    /*
     * 登录
     * 1登陆成功
     * 2用户名存在
     * 3密码错误
     */
    public function serviceLogin($result)
    {
        $password = md5($result['password']);
        $model = new LoginModel();
        $data= $model->loginModel($result);
        if($data)
        {
            if($password == $data->password)
            {

                Session()->put('username',$result['username']);
                Session()->put('u_id',$data->u_id);
                //Session::put('username',$username);
                $logModel = new LogModel();
                $logCount = $logModel->logSelectModel();

                $log = [
                    'username' => Session()->get('username'),
                    'request_time' => time(),
                    'server_addr' => $_SERVER['SERVER_ADDR'],
                    'address' => "北京海淀",
                    'http_user_agent' => $_SERVER['HTTP_USER_AGENT'],
                    'u_id' => Session()->get('u_id'),
                ];

                if(count($logCount) >= 10) {
                    $logModel->logUpdateModel($log,$logCount[0]->id);

                }else{
                    $logModel->logInsertModel($log);
                }

                return 1;
            } else {
                return 3;
            }

        }else{
            return 2;
        }

    }

}