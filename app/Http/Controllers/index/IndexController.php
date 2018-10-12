<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Services\IndexService;

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
//dd($indexType);
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
    public function list()
    {
        return view('frontend/index/list');
    }

    /*
     * 详情页
     */
    public function details()
    {
        return view('frontend/index/details');
    }

}