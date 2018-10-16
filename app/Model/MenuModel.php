<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    protected $table = 'menu';
    /*
     * 菜单表数据
     */
    public function getAllMenu()
    {
        $data = DB::table($this->table)->get();

        return $data;
    }


}