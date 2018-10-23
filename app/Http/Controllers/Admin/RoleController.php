<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\RoleService;
use App\Services\MenuService;
use App\Http\Controllers\Admin\AdminController;

class RoleController extends Controller
{

    /*
     * 角色列表
     */
    public function roleList(Request $request)
    {
        $m_id = $request->input();
        $roleService = new RoleService();
        $data = $roleService->serviceAllRole();

        $adminController = new AdminController();
        $button = $adminController->buttonMenu($m_id);

        return view('backend.role.roleList',['data'=>$data,'button'=>$button]);

    }

    /*
     * 添加角色
     */
    public function roleAdd()
    {
        $menuSercive = new MenuService();
        $menu = $menuSercive->serviceAllMenu();

        return view('backend.role.roleadd',['menu'=>$menu]);
    }

    /*
     * 处理添加数据
     */
    public function roleAddDo(Request $request)
    {
        $data = $request->post();
        $roleService = new RoleService();
        $data = $roleService->serviceAddRole($data);
        if($data) {
            return redirect('/prompt')->with([
                'message'=>'添加成功！',
                'url' =>'role/rolelist',
                'jumpTime'=>3,
                'status'=>true
            ]);
        } else {
            return redirect('/prompt')->with([
                'message'=>'添加角色失败/角色已存在！',
                'url' =>'role/roleadd',
                'jumpTime'=>3,
                'status'=>false
            ]);
        }
    }

    /*
     * 删除角色
     */
    public function roleDel(Request $request)
    {
        $r_id = $request->post('r_id');
        $roleService = new RoleService();
        $data = $roleService->serviceDelRole($r_id);
        if($data){
            return $this->roleList();
        } else {
            return 2;
        }
    }

    /*
     * 修改角色
     */
    public function roleUp($r_id)
    {
        $roleService = new RoleService();
        $data = $roleService->serviceUpRoleFirst($r_id);
        $m_id = $data->m_id;
        $menuAll = $data->menuAll;
        return view('backend.role.roleUp',[
            'data'=>$data,
            'm_id'=>$m_id,
            'menuAll'=>$menuAll
        ]);

    }

    /*
     * 处理修改角色数据
     */
    public function roleUpDo(Request $request)
    {
        $data = $request->post();
        $roleService = new RoleService();
        $res = $roleService->serviceUpDoRoleFirst($data);
        if($res) {
            return redirect('/prompt')->with([
                'message'=>'修改角色成功！',
                'url' =>'role/rolelist',
                'jumpTime'=>3,
                'status'=>true
            ]);
        } else {
            return redirect('/prompt')->with([
                'message'=>'修改角色失败！',
                'url' =>'role/rolelist',
                'jumpTime'=>3,
                'status'=>false
            ]);
        }

    }



}