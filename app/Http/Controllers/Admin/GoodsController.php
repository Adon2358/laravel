<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryAttributeService;
use App\Services\GoodsService;
use App\Services\AttributeService;
use App\Services\AttrvalueService;
use App\Services\CategoryService;
use App\Services\SkuService;
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

        return view('backend.goods.goodsList', ['data' => $data]);
    }

    /*
     * 添加商品
     */
    public function goodsAdd()
    {
        //商品分类
        $categoryService = new CategoryService();
        $category = $categoryService->serviceCategoryList();
        //属性
        $attributeService = new AttributeService();
        $attribute = $attributeService->serviceAttributeList();
        //属性值
        $attrvalueService = new AttrvalueService();
        $attrvalue = $attrvalueService->serviceAttrvalueList();

        return view('backend.goods.goodsadd', [
            'category' => $category,
            'attribute' => $attribute,
            'attrvalue' => $attrvalue,
        ]);
    }

    /*
     * 根据分类的id获取到对应属性
     */
    public function cateIdGetAttr(Request $request)
    {
        $t_id = $request->post('t_id');
        $categoryAttribute = new CategoryAttributeService();
        $attributeId = $categoryAttribute->serviceCateIdAttrId($t_id);

        //通过attr_id 查出attribute表中对应的名称
        $attribute = new AttributeService();
        $attrName = $attribute->serviceAttrIdGetAttributeName($attributeId);

        return $attrName;

    }

    /*
     * 根据属性的id获取对应的属性值
     */
    public function attrIdGetAttrvalue(Request $request)
    {
        $attr_id = $request->post('attr_id');
        $attributeModel = new AttributeService();
        $t_name = $attributeModel->serviceUpAttributeFirst($attr_id);

        $attrvalueModel = new AttrvalueService();
        $attrValueName = $attrvalueModel->serviceAttrIdGetAttrvalueName($attr_id);

        return $attrValueName;

    }

    /*
     * 处理添加数据
     */
    public function goodsAddDo(Request $request)
    {
        $this->validate($request, [
            'goods_name' => 'required',
        ]);
        $goodsService = new GoodsService();
        $data = $goodsService->serviceGoodsAdd($request);
        if ($data) {
            return redirect('/prompt')->with([
                'message' => '添加/更新成功！',
                'url' => 'goods/goodslist',
                'jumpTime' => 3,
                'status' => true
            ]);
        } else {
            return redirect('/prompt')->with([
                'message' => '添加失败！',
                'url' => 'goods/goodsadd',
                'jumpTime' => 3,
                'status' => false
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
        if ($data) {
            return $this->goodsList();
        } else {
            return 2;
        }
    }

    /*
     * 查出修改的那一条
     */
    public function goodsUp($id)
    {
        //查出修改的那一条
        $goodsService = new GoodsService();
        $data = $goodsService->serviceUpGoodsFirst($id);
        //商品分类
        $categoryService = new CategoryService();
        $category = $categoryService->serviceCategoryList();
        //属性
        $attributeService = new AttributeService();
        $attribute = $attributeService->serviceAttributeList();
        //属性值
        $attrvalueService = new AttrvalueService();
        $attrvalue = $attrvalueService->serviceAttrvalueList();

        return view('backend.goods.goodsup', [
            'data' => $data,
            'category' => $category,
            'attribute' => $attribute,
            'attrvalue' => $attrvalue,]);
    }

    /*
     * 处理修改商品数据
     */
    public function goodsUpDo(Request $request)
    {
        $goodsService = new GoodsService();
        $res = $goodsService->serviceUpDoGoodsFirst($request);
        if ($res) {
            return redirect('/prompt')->with([
                'message' => '修改商品成功！',
                'url' => 'goods/goodslist',
                'jumpTime' => 3,
                'status' => true
            ]);
        } else {
            return redirect('/prompt')->with([
                'message' => '修改商品失败！',
                'url' => 'goods/goodslist',
                'jumpTime' => 3,
                'status' => false
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
        if ($data) {
            return $this->goodsList();
        } else {
            return 2;
        }

    }

    /*
     * 添加自定义属性值
     */
    public function addAttrValueName(Request $request)
    {
        $this->validate($request, [
            'attr_value_name' => 'required',
        ]);
        $data = $request->post();
        $attributeService = new AttributeService();
        $res = $attributeService->serviceGoodsAddAttrValue($data);

        return $res;
    }

    /*
     * 根据属性值id获取sku列表
     */
    public function attridGetSku(Request $request)
    {
        $data = $request->post();
        $skuService = new SkuService();
        $res = $skuService->serviceAttrValueIdGetSkuList($data);

        return $res;
    }

}