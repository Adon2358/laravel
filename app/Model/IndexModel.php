<?php
namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class IndexModel extends Model
{
    public function m_index()
    {
        if(!Redis::get('data'))
        {
            $navigation = DB::table('navigation')->get()->toarray();
            $shop = DB::table('shop')->where('status',1)->get()->toarray();
            $shop1 = DB::table('shop')->where('status',2)->get()->toarray();
            $navigation['shop'] = $shop;
            $navigation['shop1'] = $shop1;
            $str = json_encode($navigation);
            Redis::set('data',$str);
            $data = Redis::get('data');
        }else {
            $data = Redis::get('data');
        }
//        Redis::del('data');

        return $data;
    }
}