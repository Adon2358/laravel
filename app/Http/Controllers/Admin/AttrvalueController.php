<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AttrvalueService;
use App\Services\AttributeService;
use Illuminate\Http\Request;

class AttrvalueController extends Controller
{

    /*
     * 属性值列表
     */
    public function attrvalueList()
    {
        $attrvalueService = new AttrvalueService();
        $data = $attrvalueService->serviceAttrvalueList();

        return view('backend.attrvalue.attrvalueList',['data'=>$data]);
    }

    /*
     * 添加属性值
     */
    public function attrvalueAdd()
    {
        $attributeService = new AttributeService();
        $data = $attributeService->serviceAttributeList();

        return view('backend.attrvalue.attrvalueadd',['data'=>$data]);
    }

    /*
     * 处理添加数据
     * return 1  添加成功
     * return 2  此属性值名已存在
     * return 3  添加失败
     */
    public function attrvalueAddDo(Request $request)
    {
        $this->validate($request,[
            'attr_value_name' => 'required | unique:attr_value,attr_value_name',
        ]);

        $data = $request->post();
        $attrvalueService = new AttrvalueService();
        $data = $attrvalueService->serviceAttrvalueAdd($data);
        switch ($data)
        {
            case 1:
                return redirect('/prompt')->with([
                    'message'=>'添加成功！',
                    'url' =>'attrvalue/attrvaluelist',
                    'jumpTime'=>3,
                    'status'=>true,
                ]);
                break;
            case 2:
                return redirect('/prompt')->with([
                    'message'=>'此属性已存在！',
                    'url' =>'attrvalue/attrvaluelist',
                    'jumpTime'=>3,
                    'status'=>false,
                ]);
                break;
            case 3:
                return redirect('/prompt')->with([
                    'message'=>'添加失败！',
                    'url' =>'attrvalue/attrvaluelist',
                    'jumpTime'=>3,
                    'status'=>false,
                ]);
                break;
            default:break;
        }
    }

    /*
     * 删除属性值
     */
    public function attrvalueDel(Request $request)
    {
        $attr_value_id = $request->post('attr_value_id');
        $attrvalueService = new AttrvalueService();
        $data = $attrvalueService->serviceDelAttrvalue($attr_value_id);
        if($data){
            return $this->attrvalueList();
        } else {
            return 2;
        }
    }

    /*
     * 查出修改的那一条
     */
    public function attrvalueUp($attr_value_id)
    {
        $attrvalueService = new AttrvalueService();
        $data = $attrvalueService->serviceUpAttrvalueFirst($attr_value_id);

        $attributeService = new AttributeService();
        $attribute = $attributeService->serviceAttributeList();

        return view('backend.attrvalue.attrvalueup',['data'=>$data,'attribute'=>$attribute]);
    }

    /*
     * 处理修改属性值数据
     */
    public function attrvalueUpDo(Request $request)
    {
        $data = $request->post();
        $attrvalueService = new AttrvalueService();
        $res = $attrvalueService->serviceUpDoAttrvalueFirst($data);
        if($res) {
            return redirect('/prompt')->with([
                'message'=>'修改成功！',
                'url' =>'attrvalue/attrvaluelist',
                'jumpTime'=>3,
                'status'=>true
            ]);
        } else {
            return redirect('/prompt')->with([
                'message'=>'修改失败！',
                'url' =>'attrvalue/attrvaluelist',
                'jumpTime'=>3,
                'status'=>false
            ]);
        }
    }


}