<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GoodsAttrModel extends Model
{
    protected $table = 'goods_attr';

    /*
     * 添加商品属性
     */
    public function addGoodsAttr($arr)
    {
        $data = $this->insert($arr);

        return $data;
    }

}