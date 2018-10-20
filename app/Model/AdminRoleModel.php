<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Model\RoleResourceModel;
use App\Model\MenuModel;

class AdminRoleModel extends Model
{
    protected $table = 'admin_role';

    /*
     * 根据管理员id查出相对应的角色
     */
     public function adminIdGetRoleMenu($a_id)
     {
         $adminRole = DB::table($this->table)->where('a_id',$a_id)->get();

         return $adminRole;
     }

     /*
      * 删除管理员相对应的角色
      */
     public function adminIdDelRole($a_id)
     {
         $adminRole = DB::table($this->table)->where('a_id',$a_id)->delete();

         return $adminRole;
     }

     /*
      * 添加管理员相对应的角色
      */
     public function addAdminRole($arr)
     {
         $role = $this->insert($arr);

         return $role;
     }

    /*
     * 删除角色相对应的管理员
     */
    public function roleIdDelAdmin($r_id)
    {
        $adminRole = DB::table($this->table)->where('r_id',$r_id)->delete();

        return $adminRole;
    }

}