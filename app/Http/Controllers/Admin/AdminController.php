<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AdminLoginService;
use App\Services\AdminIndexService;

class AdminController extends Controller
{
    /*
     * 后台登录
     */
    public function login()
    {
        return view('backend.admin.login');
    }

    /*
     * 处理登录
     *return 1 管理员登录成功
     * return 2 管理员密码错误
     * return 3 管理员无效
     *
     */
    public function loginDo(Request $request)
    {
        $login =  $request->post();
        $adminLoginService = new AdminLoginService();
        $data = $adminLoginService->serviceAdminLogin($login);
        switch ($data) {
            case 1 :
                return redirect('/prompt')->with([
                    'message'=>'管理员登录成功！',
                    'url' =>'admin/index',
                    'jumpTime'=>3,
                    'status'=>true
                ]);
                break;
            case 2 :
                return redirect('/prompt')->with([
                    'message'=>'管理员密码错误！',
                    'url' =>'admin/login',
                    'jumpTime'=>3,
                    'status'=>false
                ]);
                break;
            case 3 :
                return redirect('/prompt')->with([
                    'message'=>'管理员无效！',
                    'url' =>'admin/login',
                    'jumpTime'=>3,
                    'status'=>false
                ]);
                break;
            default:break;
        }
    }

    /*
     * 根据用户的权限显示相对应页面
     */
    public function index()
    {
        $adminIndexService = new AdminIndexService();
        $data = $adminIndexService->getAdminIdRole();
        return view('backend.admin.index');
    }

    /*
     * 显示无限极分类后的数组
     */
    public function test()
    {
        $admin = new AdminIndexService();
        $menu = $admin->serviceGetMenu();
        dd($menu);
    }


}