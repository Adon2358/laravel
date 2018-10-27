<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    protected $table = 'menu';

    /*
     * 根据角色资源id查出相对应的权限
     */
    public function getMenuByResourceId($resourceId)
    {
        $data = $this->whereIn('m_id',$resourceId)->where('is_menu',1)->get();

        return $data;
    }

    /*
     * 菜单表数据
     */
    public function getAllMenu()
    {
        $data = $this->orderBy('path')->get();

        return $data;
    }

    /*
     * 判断表里是否存在此权限
     */
    public function getMenuUserInfo($text)
    {
        $data = $this->where('text',$text)->first();

        return $data;
    }

    /*
     * 添加权限
     */
    public function addMenu($data)
    {
        $data = $this->insert($data);

        return $data;
    }

    /*
     * 删除权限
     */
    public function delMenu($m_id)
    {
        $data = DB::table($this->table)->where('m_id',$m_id)->delete();

        return $data;
    }

    /*
     * 查出修改的那一条
     */
    public function getUpMenu($m_id)
    {
        $data = DB::table($this->table)->where('m_id',$m_id)->first();

        return $data;
    }

    /*
     * 处理修改数据
     */
    public function getUpDoMenu($arr,$m_id)
    {
        $data = DB::table($this->table)->where('m_id',$m_id)->update($arr);

        return $data;
    }

}