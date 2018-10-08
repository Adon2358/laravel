<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Service\IndexService;

class IndexController extends  Controller
{

    /*
     * 首页
     */
    public function index()
    {
        $service = new IndexService();
        $navigation  = $service->s_index();
        $shop = $navigation['shop'];
        $shop1 = $navigation['shop1'];
        $g_type = $navigation['g_type'];
//        var_dump($g_type);die;
        unset($navigation['g_type']);
        unset($navigation['shop']);
        unset($navigation['shop1']);
        return view('frontend/index/index',[
                                                'navigation'=> $navigation,
                                                'shop' => $shop,
                                                'shop1' => $shop1,
                                                'g_type' => $g_type,
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