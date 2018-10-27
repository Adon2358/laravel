<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AttributeService;
use Illuminate\Http\Request;

class AttributeController extends Controller
{

    /*
     * 属性列表
     */
    public function attributeList()
    {
        $attributeService = new AttributeService();
        $data = $attributeService->serviceAttributeList();

        return view('backend.attribute.attributeList',['data'=>$data]);
    }

    /*
     * 添加属性
     */
    public function attributeAdd()
    {
        $attributeService = new AttributeService();
        $data = $attributeService->serviceAttributeList();

        return view('backend.attribute.attributeadd',['data'=>$data]);
    }

    /*
     * 处理添加数据
     * return 1  添加成功
     * return 2  此属性名已存在
     * return 3  添加失败
     */
    public function attributeAddDo(Request $request)
    {
        $this->validate($request,[
            'attr_name' => 'required',
        ]);
        $data = $request->post();
        $attributeService = new AttributeService();
        $data = $attributeService->serviceAttributeAdd($data);
        switch ($data)
        {
            case 1:
                return redirect('/prompt')->with([
                    'message'=>'添加成功！',
                    'url' =>'attribute/attributelist',
                    'jumpTime'=>3,
                    'status'=>true,
                ]);
                break;
            case 2:
                return redirect('/prompt')->with([
                    'message'=>'此属性已存在！',
                    'url' =>'attribute/attributelist',
                    'jumpTime'=>3,
                    'status'=>false,
                ]);
                break;
            case 3:
                return redirect('/prompt')->with([
                    'message'=>'添加失败！',
                    'url' =>'attribute/attributelist',
                    'jumpTime'=>3,
                    'status'=>false,
                ]);
                break;
            default:break;
        }
    }

    /*
     * 删除属性
     */
    public function attributeDel(Request $request)
    {
        $attr_id = $request->post('attr_id');
        $attributeService = new AttributeService();
        $data = $attributeService->serviceDelAttribute($attr_id);
        if($data){
            return $this->attributeList();
        } else {
            return 2;
        }
    }

    /*
     * 查出修改的那一条
     */
    public function attributeUp($t_id)
    {
        $attributeService = new AttributeService();
        $data = $attributeService->serviceUpAttributeFirst($t_id);

        return view('backend.attribute.attributeup',['data'=>$data]);
    }

    /*
     * 处理修改属性数据
     */
    public function attributeUpDo(Request $request)
    {
        $data = $request->post();
        $attributeService = new AttributeService();
        $res = $attributeService->serviceUpDoAttributeFirst($data);
        if($res) {
            return redirect('/prompt')->with([
                'message'=>'修改成功！',
                'url' =>'attribute/attributelist',
                'jumpTime'=>3,
                'status'=>true
            ]);
        } else {
            return redirect('/prompt')->with([
                'message'=>'修改失败！',
                'url' =>'attribute/attributelist',
                'jumpTime'=>3,
                'status'=>false
            ]);
        }
    }


}