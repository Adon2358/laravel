<?php
/**
 * Created by PhpStorm.
 * User: Adon
 * Date: 2018/9/29
 * Time: 10:02
 */
namespace App\Http\Controllers\Index;

use App\Service\LoginService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    /*
     * 注册
     */
    public function register()
    {
        return view('frontend/login/register');
    }
    /*
     * 处理注册
     */
    public function registerdo(Request $request)
    {

        $sign = $request->post();
        $arr['name'] = $sign['name'];
        $arr['pwd'] = $sign['pwd'];
        $service = new LoginService();
        $res = $service->s_rigster($arr);
        if($res)
        {
            return "注册成功";
        } else {
            return "注册失败";
        }
    }
}