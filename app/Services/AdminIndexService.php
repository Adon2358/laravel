<?php

namespace App\Services;

use App\Model\MenuModel;
use App\Model\AdminRoleModel;

class AdminIndexService
{

    /*
     * 菜单表的数据
     */
    public function serviceGetMenu()
    {
        $menuModel = new MenuModel();
        $data = $menuModel->getAllMenu();
        $getMenu = $this->Tree($data);

        return $getMenu;
    }

    /*
     * 根据相应的管理员查出相应的角色
     */
    public function getAdminIdRole()
    {
        $a_id = Session()->get('admin')->a_id;
        $adminRole = new AdminRoleModel();
        $data = $adminRole->adminIdGetRoleName($a_id);
//dd($data->r_name);
        return $data;

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
                foreach ($v as $key=>$va)
                {
                    if($va['p_id'] == $path){
                        $va['submenu'] = $this->Tree($arr,$va['m_id']);
                        $data[] = array_filter($va);
                    }
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