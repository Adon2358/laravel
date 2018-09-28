<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

class IndexController extends  Controller
{

    /*
     * 首页
     */
    public function index()
    {
        return view('frontend/index/index');
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