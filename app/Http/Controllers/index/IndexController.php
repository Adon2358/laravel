<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Services\IndexService;
use App\Services\GoodsService;

class IndexController extends  Controller
{

    /*
     * 首页
     */
    public function index()
    {
        $service = new IndexService();
        $navigation  = $service->serviceIndex();
        $singleGoods = $navigation['singleGoods'];
        $partGoods = $navigation['partGoods'];
        $indexType = $navigation['indexType'];

        unset($navigation['singleGoods']);
        unset($navigation['partGoods']);
        unset($navigation['indexType']);
        return view('frontend/index/index',[
            'navigation'=> $navigation,
            'singleGoods' => $singleGoods,
            'partGoods' => $partGoods,
            'indexType' => $indexType,
            ]);
    }

    /*
     * 列表页
     */
    public function list($t_id)
    {
        $goodsService = new GoodsService();
        $goods = $goodsService->serviceCateIdGetGoods($t_id);

        return view('frontend/index/list',[
            'goods' => $goods,
        ]);
    }

    /*
     * 详情页
     */
    public function details($goods_id)
    {
        $goodsService = new GoodsService();
        $goods = $goodsService->serviceUpGoodsFirst($goods_id);

        return view('frontend/index/details',[
            'goods' => $goods,
        ]);
    }

}