<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class RoleResourceModel extends Model
{
    protected $table = 'role_resource';

    /*
     * 通过admin_role查出来的r_id查出相对应的权限
     */
    public function ridGetResource($roleId)
    {
        $roleMenu = DB::table($this->table)->whereIn('r_id',$roleId)->get();

        return $roleMenu ;
    }

    /*
     * 通过admin_role查出来的r_id查出相对应的权限
     */
    public function ridGetResourceId($r_id)
    {
        $roleMenu = DB::table($this->table)->where('r_id',$r_id)->get();

        return $roleMenu ;
    }

    /*
     * 删除角色对应的权限
     */
    public function delRoleMenu($r_id)
    {
        $roleMenu = DB::table($this->table)->where('r_id',$r_id)->delete();

        return $roleMenu ;
    }

    /*
     * 添加角色权限
     */
    public function addRoleMenu($arr)
    {
        $roleMenu = $this->insert($arr);

        return $roleMenu;
    }

    /*
     * 根据权限id删除resourceid
     */
    public function menuIdDelRoleResourceId($m_id)
    {
        $resource = DB::table($this->table)->where('resource_id',$m_id)->delete();

        return $resource ;
    }

    /*
     * 按钮权限
     */
    public function buttonMenu()
    {
        $res = DB::table($this->table)->where('type',0)->get();

        return $res;
    }

}