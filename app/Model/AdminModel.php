<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    //指定表名
    protected $table = 'admin';

    /*
     * 根据登录的邮箱查出相应的数据
     */
    public function getAdminUserInfo($a_email)
    {
        $data = DB::table($this->table)->where('a_email',$a_email)->first();

        return $data;
    }

    /*
     * 更新管理员登录时间
     */
    public function upadteAdminloginTime($a_id,$a_log_time)
    {
        $data = DB::table($this->table)->where('a_id',$a_id)->update([
            'a_login_time'=>$a_log_time,
        ]);

        return $data;
    }

}