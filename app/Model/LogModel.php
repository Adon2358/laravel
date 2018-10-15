<?php
namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class LogModel
{
    /*
     * 登录成功查询日志
     */
    public function logSelectModel()
    {
        $u_id = Session()->get('u_id');
        $data = DB::table('user_insert_log')->where('u_id',$u_id)->orderby('request_time')->get();

        return $data;
    }

    /*
     * 登录成功添加日志
     */
    public function logInsertModel($log)
    {
        $data = DB::table('user_insert_log')->insert($log);

        return $data;
    }

    /*
     * 登陆成功 同一用户满足10条 倒序 将第一条时间改为当前时间
     */
    public function logUpdateModel($log,$id)
    {
        $data = DB::table('user_insert_log')->where('id',$id)->update($log);

        return $data;
    }

}