<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SkuModel extends Model
{
    protected $table = 'sku';

    public $timestamps = false;


    /*
     * 添加
     */
    public function addSku($arr)
    {
        $data = $this->insert($arr);

        return $data;
    }

}
