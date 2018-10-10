<?php
namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class NavigationModel extends Model
{
    /*
     * 首页导航（navigation）
     */
    public function navigationModel()
    {
        $navigation = DB::table('navigation')->get()->toarray();

        return $navigation;
    }
}