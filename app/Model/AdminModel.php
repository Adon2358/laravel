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
    public function upadteAdminloginTime($a_id,$a_last_time)
    {

        $data = DB::table($this->table)->where('a_id',$a_id)->update([
            'a_last_time'=>$a_last_time,
        ]);

        return $data;
    }

    /*
     * 管理员表数据
     */
    public function getAllAdmin()
    {
        $data = $this->paginate(2);

        return $data;
    }

    /*
     * 添加管理员
     */
    public function addAdmin($data)
    {
        $data = $this->insertGetId($data);

        return $data;
    }

    /*
     * 删除管理员
     */
    public function delAdmin($a_id)
    {
        $data = DB::table($this->table)->where('a_id',$a_id)->delete();

        return $data;
    }

    /*
     * 查出修改的那一条
     */
    public function getUpAdmin($a_id)
    {
        $data = DB::table($this->table)->where('a_id',$a_id)->first();

        return $data;
    }

    /*
     * 处理修改数据
     */
    public function getUpDoAdmin($arr,$a_id)
    {
        $data = DB::table($this->table)->where('a_id',$a_id)->update($arr);

        return $data;
    }

    /*
     * 冻结
     */
    public function AdminValidD($a_id)
    {
        $data = DB::table($this->table)->where('a_id',$a_id)->update([
            'a_is_valid' => 0,
        ]);

        return $data;
    }

    /*
     *解冻
     */
    public function AdminValidJ($a_id)
    {
        $data = DB::table($this->table)->where('a_id',$a_id)->update([
            'a_is_valid' => 1,
        ]);

        return $data;
    }

}