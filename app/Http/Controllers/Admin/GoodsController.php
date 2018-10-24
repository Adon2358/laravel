<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\GoodsService;
use App\Services\BrandService;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class GoodsController extends Controller
{

    /*
     * 商品列表
     */
    public function goodsList()
    {
       $goodsService = new GoodsService();
       $data = $goodsService->serviceGoodsList();

       return view('backend.goods.goodsList',['data'=>$data]);
    }

    /*
     * 添加商品
     */
    public function goodsAdd()
    {
        $brandService = new BrandService();
        $brand = $brandService->serviceBrandList();
        $categoryService = new CategoryService();
        $category = $categoryService->serviceCategoryList();

        return view('backend.goods.goodsadd',['category'=>$category,'brand'=>$brand]);
    }

    /*
     * 处理添加数据
     */
    public function goodsAddDo(Request $request)
    {
        $data = $request->post();
        $goodsService = new GoodsService();
        $data = $goodsService->serviceGoodsAdd($data);
        if($data) {
            return redirect('/prompt')->with([
                'message'=>'添加/更新成功！',
                'url' =>'goods/goodslist',
                'jumpTime'=>3,
                'status'=>true
            ]);
        } else {
            return redirect('/prompt')->with([
                'message'=>'添加失败！',
                'url' =>'goods/goodsadd',
                'jumpTime'=>3,
                'status'=>false
            ]);
        }
    }

    /*
     * 删除商品
     */
    public function goodsDel(Request $request)
    {
        $goods_id = $request->post('goods_id');
        $goodsService = new GoodsService();
        $data = $goodsService->serviceDelGoods($goods_id);
        if($data){
            return $this->goodsList();
        } else {
            return 2;
        }
    }

    /*
     * 查出修改的那一条
     */
    public function goodsUp($goods_id)
    {
        //查出修改的那一条
        $goodsService = new GoodsService();
        $data = $goodsService->serviceUpGoodsFirst($goods_id);
        //品牌表
        $brandService = new BrandService();
        $brand = $brandService->serviceBrandList();
        //分类表
        $categoryService = new CategoryService();
        $category = $categoryService->serviceCategoryList();

        return view('backend.goods.goodsup',['data'=>$data,'category'=>$category,'brand'=>$brand]);
    }

    /*
     * 处理修改商品数据
     */
    public function goodsUpDo(Request $request)
    {
        $data = $request->post();
        $goodsService = new GoodsService();
        $res = $goodsService->serviceUpDoGoodsFirst($data);
        if($res) {
            return redirect('/prompt')->with([
                'message'=>'修改商品成功！',
                'url' =>'goods/goodslist',
                'jumpTime'=>3,
                'status'=>true
            ]);
        } else {
            return redirect('/prompt')->with([
                'message'=>'修改商品失败！',
                'url' =>'goods/goodslist',
                'jumpTime'=>3,
                'status'=>false
            ]);
        }

    }

    /*
     * 上架/下架
     */
    public function goodsStatus(Request $request)
    {
        $goods_id = $request->post('goods_id');
        $goodsService = new GoodsService();
        $data = $goodsService->serviceGoodsStatus($goods_id);
        if($data){
            return $this->goodsList();
        } else {
            return 2;
        }

    }

}