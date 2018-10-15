<?php
namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
    /*
     * shop表
     * 根据状态查出相对应的商品
     */
    public function getModelShopStatus($status)
    {
        $shop = DB::table('shop')->where('status',$status)->get();
        return $shop;

    }

}