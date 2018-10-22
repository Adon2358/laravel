<?php

namespace App\Services;

use DB;
use App\Model\AdminModel;
use App\Model\MenuModel;
use App\Model\AdminRoleModel;
use App\Model\RoleResourceModel;

class AdminIndexService
{

    /*
     * 管理员表数据
     */
    public function serviceAllAdmin()
    {
        $adminModel = new AdminModel();
        $data = $adminModel->getAllAdmin();

        return $data;
    }

    /*
     * 添加管理员
     */
    public function serviceAddAdmin($data)
    {
        $arr = [
            'a_email' => $data['a_email'],
            'a_pwd' => md5($data['a_pwd']),
            'a_name' => $data['a_name'],
            'a_is_admin' => $data['a_is_admin'],
            'a_create_time' => time(),
        ];
        $r_id = $data['r_id'];
        $adminModel = new AdminModel();
        $res = $adminModel->getAdminUserInfo($arr['a_email']);
        if($res)
        {
            return false;
        }
        $data = $adminModel->AddAdmin($arr);
        $arr = $this->serviceAddAdminRole($data,$r_id);
        $adminRole = new AdminRoleModel();
        $adminRole->addAdminRole($arr);

        return $data;
    }

    /*
     * 添加为此管理员分配的角色（sdmin_role）
     */
    public function serviceAddAdminRole($a_id,$r_id)
    {
        $arr = [];
        foreach ($r_id as $v)
        {
            $arr[] = [
                'a_id' => $a_id,
                'r_id' => $v,
            ];
        }

        return $arr;
    }


    /*
     * 删除管理员
     */
    public function serviceDelAdmin($a_id)
    {
        $adminModel = new AdminModel();
        $res = $adminModel->delAdmin($a_id);

        $adminRole = new AdminRoleModel();
        $adminRole->adminIdDelRole($a_id);

        return $res;
    }

    /*
     * 查询出修改的那一条
     */
    public function serviceUpAdminFirst($a_id)
    {
        $adminModel = new AdminModel();
        $res = $adminModel->getUpAdmin($a_id);
        $adminRole = new AdminRoleModel();
        $role = $adminRole->adminIdGetRoleMenu($a_id);
        $role = $this->objectToArray($role);
        $res->role = $role;

        return $res;
    }

    /*
     * 处理修改数据
     */
    public function serviceUpDoAdminFirst($data)
    {
        $a_id = $data['a_id'];
        $arr = [
            'a_email' => $data['a_email'],
            'a_name' => $data['a_name'],
        ];
        $r_id = $data['r_id'];
        foreach ($r_id as $k=>$v)
        {
            $role [] =[
                'r_id' => $v,
                'a_id' => $a_id,
            ];
        }
        $result = true;
        DB::beginTransaction();
        try{
            $adminModel = new AdminModel();
            $adminModel->getUpDoAdmin($arr,$a_id);
            $adminRole = new AdminRoleModel();
            $adminRole->adminIdDelRole($a_id);
            $adminRole->addAdminRole($role);
            DB::commit();
        }catch(\Exception $e){
            $result = false;
            $e->getMessage();
            DB::rollBack();
        }
        if($result){
            return true;
        }else{
            return false;
        }
    }

    /*
     * 冻结/解冻
     */
    public function serviceAdminValid($a_id)
    {
        $adminModel = new AdminModel();
        //查出那一条数据
        $res = $adminModel->getUpAdmin($a_id);
        if($res->a_is_valid == 1)
        {
            $data = $adminModel->AdminValidD($a_id);
        }else{
            $data = $adminModel->AdminValidJ($a_id);
        }

        return $data;
    }

    /*
     * 根据相应的管理员查出相应角色的权限
     */
    public function serviceGetAdminIdRoleMenu()
    {
        $a_id = Session()->get('admin')->a_id;
        $adminRole = new AdminRoleModel();
        $adminRole = $adminRole->adminIdGetRoleMenu($a_id)->toarray();
        $roleId = array_column($adminRole,'r_id');

        $roleModel = new RoleResourceModel();
        $roleMenu = $roleModel->ridGetResource($roleId)->toarray();
        $resourceId = array_column($roleMenu,'resource_id');

        $menuModel = new MenuModel();
        $menu = $menuModel->getMenuByResourceId($resourceId)->toarray();

        $getMenu = $this->Tree($menu);

        return $getMenu;

    }

    /*
    * 无限极分类
    */
    public function Tree($arr,$path = 0)
    {
        $arr = $this->objectToArray($arr);
        $data = [];
        if (is_array($arr)){
            foreach ($arr as $k => $v) {
                if($v['p_id'] == $path){
                    $v['submenu'] = $this->Tree($arr,$v['m_id']);
                    $data[] = array_filter($v);
                }
            }
        }

        return $data;
    }

    /*
     * 对象转数组
     */
    public function objectToArray($arr)
    {
        $e = (array)$arr;
        foreach ($e as $k => $v) {
            if (gettype($v) == 'resource') return;
            if (gettype($v) == 'object' || gettype($v) == 'array')
                $e[$k] = (array)$this->objectToArray($v);
        }

        return $e;
    }

}