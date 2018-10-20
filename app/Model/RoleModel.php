<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    //指定表名
    protected $table = 'role';

    /*
     * 角色表数据
     */
    public function getAllRole()
    {
        $data = $this->get();

        return $data;
    }

    /*
     * 判断表里是否存在此角色
     */
    public function getRoleUserInfo($r_name)
    {
        $data = $this->where('r_name',$r_name)->first();

        return $data;
    }

    /*
     * 添加管理员
     */
    public function addRole($data)
    {
        $data = $this->insertGetId($data);

        return $data;
    }

    /*
     * 删除角色
     */
    public function delRole($r_id)
    {
        $data = DB::table($this->table)->where('r_id',$r_id)->delete();

        return $data;
    }

    /*
     * 查出修改的那一条
     */
    public function getUpRole($r_id)
    {
        $data = DB::table($this->table)->where('r_id',$r_id)->first();

        return $data;
    }

    /*
     * 处理修改数据
     */
    public function getUpDoRole($arr,$r_id)
    {
        $data = DB::table($this->table)->where('r_id',$r_id)->update($arr);

        return $data;
    }

}