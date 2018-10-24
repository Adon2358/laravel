<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    /*
     * 品牌列表
     */
    public function brandList()
    {
        $brandService = new BrandService();
        $data = $brandService->serviceBrandList();

        return view('backend.brand.brandList',['data'=>$data]);
    }

    /*
     * 添加品牌
     */
    public function brandAdd()
    {
        return view('backend.brand.brandadd');
    }

    /*
     * 处理添加数据
     * return 1  添加成功
     * return 2  此品牌名已存在
     * return 3  添加失败
     */
    public function brandAddDo(Request $request)
    {
        $data = $request->post();
        $brandService = new BrandService();
        $data = $brandService->serviceBrandAdd($data);
        switch ($data)
        {
            case 1:
                    return redirect('/prompt')->with([
                'message'=>'添加成功！',
                'url' =>'brand/brandlist',
                'jumpTime'=>3,
                'status'=>true,
                 ]);
            break;
            case 2:
                    return redirect('/prompt')->with([
                'message'=>'此品牌已存在！',
                'url' =>'brand/brandlist',
                'jumpTime'=>3,
                'status'=>false,
                ]);
            break;
            case 3:
                   return redirect('/prompt')->with([
                'message'=>'添加失败！',
                'url' =>'brand/brandlist',
                'jumpTime'=>3,
                'status'=>false,
                ]);
            break;
            default:break;
        }
    }

    /*
     * 删除商品
     */
    public function brandDel(Request $request)
    {
        $brand_id = $request->post('brand_id');
        $brandService = new BrandService();
        $data = $brandService->serviceDelBrand($brand_id);
        if($data){
            return $this->brandList();
        } else {
            return 2;
        }
    }

    /*
     * 查出修改的那一条
     */
    public function brandUp($goods_id)
    {
        $brandService = new BrandService();
        $data = $brandService->serviceUpBrandFirst($goods_id);

        return view('backend.brand.brandup',['data'=>$data]);
    }

    /*
     * 处理修改品牌数据
     */
    public function brandUpDo(Request $request)
    {
        $data = $request->post();
        $brandService = new BrandService();
        $res = $brandService->serviceUpDobrandFirst($data);
        if($res) {
            return redirect('/prompt')->with([
                'message'=>'修改品牌成功！',
                'url' =>'brand/brandlist',
                'jumpTime'=>3,
                'status'=>true
            ]);
        } else {
            return redirect('/prompt')->with([
                'message'=>'修改品牌失败！',
                'url' =>'brand/brandlist',
                'jumpTime'=>3,
                'status'=>false
            ]);
        }
    }


}