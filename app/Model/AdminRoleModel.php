<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Model\RoleModel;

class AdminRoleModel extends Model
{
    protected $table = 'admin_role';

    /*
     * 根据管理员id查出相对应的权限
     */
     public function adminIdGetRoleName($a_id)
     {
         $adminRole= DB::table($this->table)->where('r_id',$a_id)->first();
         $roleModel = new RoleModel();
         $roleName = $roleModel->ridGetRname($adminRole->r_id);

         return $roleName;
     }

}