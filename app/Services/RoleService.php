<?php

namespace App\Services;

use DB;
use App\Model\MenuModel;
use App\Model\RoleModel;
use App\Model\RoleResourceModel;
use App\Model\AdminRoleModel;

class RoleService
{

    /*
     * 角色表数据
     */
    public function serviceAllRole()
    {
        $roleModel = new RoleModel();
        $data = $roleModel->getAllRole()->toarray();

        return $data;
    }

    /*
     * 添加角色
     */
    public function serviceAddRole($data)
    {
        $arr = [
            'r_name' => $data['r_name'],
        ];
        $m_id = $data['m_id'];
        $roleModel = new RoleModel();
        $res = $roleModel->getRoleUserInfo($arr['r_name']);
        if($res)
        {
            return false;
        }
        $data = $roleModel->addRole($arr);
        $arr = $this->serviceRoleMenu($data,$m_id);
        $roleResource = new RoleResourceModel();
        $roleResource->addRoleMenu($arr);

        return $data;
    }

    /*
     * 分配的权限组成二维数组
     */
    public function serviceRoleMenu($r_id,$m_id)
    {
        $arr = [];
        foreach($m_id as $k=>$v)
        {
            $arr[] = [
                'r_id' => $r_id,
                'resource_id' => $v,
            ];
        }

        return $arr;
    }

    /*
     * 删除角色
     */
    public function serviceDelRole($r_id)
    {
        $roleModel = new RoleModel();
        $res = $roleModel->delRole($r_id);
        $adminRole = new AdminRoleModel();
        $adminRole->roleIdDelAdmin($r_id);
        $roleResource = new RoleResourceModel();
        $roleResource->delRoleMenu($r_id);

        return $res;
    }

    /*
     * 查询出修改的那一条
     */
    public function serviceUpRoleFirst($r_id)
    {
        $roleModel = new RoleModel();
        $res = $roleModel->getUpRole($r_id);
        $menuAll = new MenuModel();
        $menu = $menuAll->getAllMenu()->toarray();
        $roleResourceModel = new RoleResourceModel();
        $m_id = $roleResourceModel->ridGetResourceId($r_id);
        $m_id = $this->objectToArray($m_id);
        $arr = [];
        foreach ($m_id as $k=>$v)
        {
            foreach ($v as $key=>$va)
            {
                $arr[] = $va['resource_id'];
            }
        }
        $res->menuAll = $menu;
        $res->m_id = $arr;
        return $res;
    }

    /*
     * 处理修改数据
     */
    public function serviceUpDoRoleFirst($data)
    {
        $r_id = $data['r_id'];
        $arr = [
            'r_name' => $data['r_name'],
        ];
        $m_id = $data['m_id'];
        $menu_id = [];
        foreach ($m_id as $k=>$v)
        {
            $menu_id[] = [
                'r_id' => $r_id,
                'resource_id' => $v,
            ];
        }
        $result = true;
        DB::beginTransaction();
        try{
            $roleModel = new RoleModel();
            $roleModel->getUpDoRole($arr,$r_id);
            $roleResourceMenu = new RoleResourceModel();
            $roleResourceMenu->delRoleMenu($r_id);
            $roleResourceMenu->addRoleMenu($menu_id);
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