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

        return view('frontend/index/index',['navigation'=>$navigation]);
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