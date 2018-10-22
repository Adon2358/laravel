<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MenuService;

class MenuController extends Controller
{

    /*
     * 菜单(权限)列表
     */
    public function menuList()
    {
        $menuService = new MenuService();
        $data = $menuService->serviceAllMenu();

        return view('backend.menu.menuList',['data'=>$data]);

    }

    /*
     * 添加菜单
     */
    public function menuAdd()
    {
        $menuService = new MenuService();
        $data = $menuService->serviceAllMenu();
        return view('backend.menu.menuadd',['data'=>$data]);
    }

    /*
     * 处理添加数据
     */
    public function menuAddDo(Request $request)
    {
        $data = $request->post();
        $menuService = new MenuService();
        $data = $menuService->serviceAddMenu($data);
        if($data) {
            return redirect('/prompt')->with([
                'message'=>'添加成功！',
                'url' =>'menu/menulist',
                'jumpTime'=>3,
                'status'=>true
            ]);
        } else {
            return redirect('/prompt')->with([
                'message'=>'添加菜单失败/菜单已存在！',
                'url' =>'menu/menuadd',
                'jumpTime'=>3,
                'status'=>false
            ]);
        }
    }

    /*
     * 删除菜单
     */
    public function menuDel(Request $request)
    {
        $m_id = $request->post('m_id');
        $menuService = new MenuService();
        $data = $menuService->serviceDelMenu($m_id);
        if($data){
            return $this->menuList();
        } else {
            return 2;
        }
    }

    /*
     * 修改菜单
     */
    public function menuUp($m_id)
    {
        $menuService = new MenuService();
        $data = $menuService->serviceUpMenuFirst($m_id);

        $menuService = new MenuService();
        $res = $menuService->serviceAllMenu();

        return view('backend.menu.menuUp',['data'=>$data,'res'=>$res]);

    }

    /*
     * 处理修改菜单数据
     */
    public function menuUpDo(Request $request)
    {
        $data = $request->post();
        $menuService = new MenuService();
        $res = $menuService->serviceUpDoMenuFirst($data);
        if($res) {
            return redirect('/prompt')->with([
                'message'=>'修改菜单成功！',
                'url' =>'menu/menulist',
                'jumpTime'=>3,
                'status'=>true
            ]);
        } else {
            return redirect('/prompt')->with([
                'message'=>'修改菜单失败！',
                'url' =>'menu/menulist',
                'jumpTime'=>3,
                'status'=>false
            ]);
        }

    }



}