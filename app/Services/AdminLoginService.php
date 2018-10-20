<?php

namespace App\Services;

use App\Model\AdminModel;
use Illuminate\Support\Facades\Redis;

class AdminLoginService
{
    /*
     * 管理员登录
     * return 1 管理员登录成功
     * return 2 更新管理员登录时间失败
     * return 3 管理员无效
     */
    public function serviceAdminLogin($result)
    {
        $a_email = $result['a_email'];
        $adminModel = new AdminModel();
        $data = $adminModel->getAdminUserInfo($a_email);
        $a_pwd = md5($result['a_pwd']);
        if($a_pwd != $data->a_pwd)
        {
            return 2;
        }
        if($data->a_is_valid != 1)
        {
            return 3;
        }
        $a_last_time = time();
        $adminModel->upadteAdminloginTime($data->a_id,$a_last_time);
        $data->a_last_time = $a_last_time;
        Session()->put('admin',$data);

        return 1;
    }

}