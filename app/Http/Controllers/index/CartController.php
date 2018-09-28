<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

class CartController extends  Controller
{

    /*
     * 购物车
     */
    public function cart()
    {
        return view('frontend/cart/cart');
    }
    /*
     * 订单
     */
    public function order()
    {
        return view('frontend/cart/order');
    }
}
