<?php
namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class IndexTypeModel extends Model
{
    /*
     * 首页分类
     */
    public function getIndexType()
    {
        $getType = DB::table('goods_type')->get()->toarray();

        return $getType;
    }

}