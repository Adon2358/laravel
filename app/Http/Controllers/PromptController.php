<?php
/**
 * Created by PhpStorm.
 * User: Adon
 * Date: 2018/10/8
 * Time: 19:33
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromptController extends Controller
{
    public function index()
    {
        //验证参数
        if(!empty(session('message')) && !empty(session('url')) && !empty(session('jumpTime'))){
            $data = [
                'message' => session('message'),
                'url' => session('url'),
                'jumpTime' => session('jumpTime'),
                'status' => session('status')
            ];
        } else {
            $data = [
                'message' => '请勿非法访问！',
                'url' => 'index/index',
                'jumpTime' => 3,
                'status' => false
            ];
        }
        return view('prompt/prompt',['data' => $data]);
    }
}