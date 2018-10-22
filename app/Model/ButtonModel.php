<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class ButtonModel extends Model
{
    protected $table = 'button';

    /*
     * 按钮表数据
     */
    public function getAllButton()
    {
        $data = DB::table($this->table)->get();

        return $data;
    }

    /*
     * 判断表里是否存在此角色
     */
    public function getButtonUserInfo($b_name)
    {
        $data = $this->where('b_name',$b_name)->first();

        return $data;
    }

    /*
     * 添加管理员
     */
    public function addButton($data)
    {
        $data = $this->insert($data);

        return $data;
    }

    /*
     * 删除角色
     */
    public function delButton($b_id)
    {
        $data = DB::table($this->table)->where('b_id',$b_id)->delete();

        return $data;
    }

    /*
     * 查出修改的那一条
     */
    public function getUpButton($b_id)
    {
        $data = DB::table($this->table)->where('b_id',$b_id)->first();

        return $data;
    }

    /*
     * 处理修改数据
     */
    public function getUpDoButton($arr,$b_id)
    {
        $data = DB::table($this->table)->where('b_id',$b_id)->update($arr);

        return $data;
    }

    /*
     * 根据m_id删除button
     */
    public function menuIdDelButton($m_id)
    {
        $data = DB::table($this->table)->where('m_id',$m_id)->delete();

        return $data;
    }

}