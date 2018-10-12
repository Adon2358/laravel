<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class IndexTypeModel extends Model
{
    /*
     * 首页分类表
     */
    public function getType()
    {
        $getType = DB::table('index_type')->get();

        return $getType;
    }

}