<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ButtonService;
use App\Services\MenuService;

class ButtonController extends Controller
{

    /*
     * 按钮列表
     */
    public function buttonList()
    {
        $buttonService = new ButtonService();
        $data = $buttonService->serviceAllButton();

        return view('backend.button.buttonList',['data'=>$data]);

    }

    /*
     * 添加按钮
     */
    public function buttonAdd()
    {
        $buttonService = new MenuService();
        $res = $buttonService->serviceAllMenu();

        return view('backend.button.buttonadd',['res'=>$res]);
    }

    /*
     * 处理添加数据
     */
    public function buttonAddDo(Request $request)
    {
        $data = $request->post();
        $buttonService = new ButtonService();
        $data = $buttonService->serviceAddButton($data);
        if($data) {
            return redirect('/prompt')->with([
                'message'=>'添加成功！',
                'url' =>'button/buttonlist',
                'jumpTime'=>3,
                'status'=>true
            ]);
        } else {
            return redirect('/prompt')->with([
                'message'=>'添加菜单失败/菜单已存在！',
                'url' =>'button/buttonadd',
                'jumpTime'=>3,
                'status'=>false
            ]);
        }
    }

    /*
     * 删除按钮
     */
    public function buttonDel(Request $request)
    {
        $b_id = $request->post('b_id');
        $buttonService = new ButtonService();
        $data = $buttonService->serviceDelButton($b_id);
        if($data){
            return $this->buttonList();
        } else {
            return 2;
        }
    }

    /*
     * 修改按钮
     */
    public function buttonUp($b_id)
    {
        $buttonService = new ButtonService();
        $data = $buttonService->serviceUpButtonFirst($b_id);

        $menuService = new MenuService();
        $res = $menuService->serviceAllMenu();

        return view('backend.button.buttonUp',['data'=>$data,'res'=>$res]);

    }

    /*
     * 处理修改菜单数据
     */
    public function buttonUpDo(Request $request)
    {
        $data = $request->post();
        $buttonService = new ButtonService();
        $res = $buttonService->serviceUpDoButtonFirst($data);
        if($res) {
            return redirect('/prompt')->with([
                'message'=>'修改菜单成功！',
                'url' =>'button/buttonlist',
                'jumpTime'=>3,
                'status'=>true
            ]);
        } else {
            return redirect('/prompt')->with([
                'message'=>'修改菜单失败！',
                'url' =>'button/buttonlist',
                'jumpTime'=>3,
                'status'=>false
            ]);
        }

    }



}