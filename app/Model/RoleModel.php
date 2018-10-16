<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table = 'role';

    /*
     * 通过admin_role查出来的r_id查出相对应的角色
     */
    public function ridGetRname($r_id)
    {
        $roleName = DB::table($this->table)->where('r_id',$r_id)->first();

        return $roleName;
    }

}