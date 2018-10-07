<?php
namespace App\Service;

use App\Model\LoginModel;

class LoginService
{

    /*
     * 注册
     */
    public function s_rigster($res)
    {
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