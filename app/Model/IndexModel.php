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
            $data = DB::table('navigation')->get()->toarray();
            $str = json_encode($data);
            Redis::set('data',$str);
            $data = Redis::get('data');
        }else {
            $data = Redis::get('data');
        }

        return $data;
    }
}