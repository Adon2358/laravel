<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AdminLoginService;
use App\Services\AdminIndexService;
use App\Services\RoleService;

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
     *退出登录
     */
    public function loginOut()
    {
        session(['admin'=>false]);
        return redirect('/prompt')->with([
            'message'=>'退出成功！',
            'url' =>'admin/login',
            'jumpTime'=>3,
            'status'=>true
        ]);
    }

    /*
     * 根据用户的权限显示相对应页面
     */
    public function index()
    {
        if(!Session()->has('admin')) {
            return redirect('/prompt')->with([
                'message'=>'请先登录！',
                'url' =>'admin/login',
                'jumpTime'=>3,
                'status'=>false
            ]);
        }
        return view('backend.admin.index');
    }

    /*
     * 管理员列表
     */
    public function adminList()
    {
        $adminIndexService = new AdminIndexService();
        $data = $adminIndexService->serviceAllAdmin();

        return view('backend.admin.adminList',['data'=>$data]);

    }

    /*
     * 添加管理员
     */
    public function adminAdd()
    {
        $role = new RoleService();
        $roleAll = $role->serviceAllRole();

        return view('backend.admin.adminadd',['role'=>$roleAll]);
    }

    /*
     * 处理添加数据
     */
    public function adminAddDo(Request $request)
    {
        $data = $request->post();
        $adminIndexService = new AdminIndexService();
        $data = $adminIndexService->serviceAddAdmin($data);
        if($data) {
            return redirect('/prompt')->with([
                'message'=>'添加成功！',
                'url' =>'admin/adminlist',
                'jumpTime'=>3,
                'status'=>true
            ]);
        } else {
            return redirect('/prompt')->with([
                'message'=>'添加管理员失败/管理员已存在！',
                'url' =>'admin/adminadd',
                'jumpTime'=>3,
                'status'=>false
            ]);
        }
    }

    /*
     * 删除管理员
     */
    public function adminDel(Request $request)
    {
        $a_id = $request->post('a_id');
        $adminIndexService = new AdminIndexService();
        $data = $adminIndexService->serviceDelAdmin($a_id);
        if($data){
            return $this->adminList();
        } else {
            return 2;
        }
    }

    /*
     * 修改管理员
     */
    public function adminUp($a_id)
    {
        $adminIndxService = new AdminIndexService();
        $data = $adminIndxService->serviceUpAdminFirst($a_id);
        $role = $data->role;
        unset($data->role);
        foreach($role as $k=>$v)
        {
            $r_id = array_column($v,'r_id');
        }
        $roleService = new RoleService();
        $roleAll = $roleService->serviceAllRole();

        return view('backend.admin.adminUp',['data'=>$data,'r_id'=>$r_id,'roleAll'=>$roleAll]);

    }

    /*
     * 处理修改管理员数据
     */
    public function adminUpDo(Request $request)
    {
        $data = $request->post();
        $adminIndexService = new AdminIndexService();
        $res = $adminIndexService->serviceUpDoAdminFirst($data);
        if($res) {
            return redirect('/prompt')->with([
                'message'=>'修改管理员成功！',
                'url' =>'admin/adminlist',
                'jumpTime'=>3,
                'status'=>true
            ]);
        } else {
            return redirect('/prompt')->with([
                'message'=>'修改管理员失败！',
                'url' =>'admin/adminlist',
                'jumpTime'=>3,
                'status'=>false
            ]);
        }

    }

    /*
     * 冻结/解冻
     */
    public function adminValid(Request $request)
    {
        $a_id = $request->post('a_id');
        $adminIndexService = new AdminIndexService();
        $data = $adminIndexService->serviceAdminValid($a_id);
        if($data){
            return $this->adminList();
        } else {
            return 2;
        }

    }

//    /*
//     * 显示无限极分类后的数组
//     */
//    public function test()
//    {
//        $admin = new AdminIndexService();
//        $menu = $admin->serviceGetMenu();
//        dd($menu);
//    }

}