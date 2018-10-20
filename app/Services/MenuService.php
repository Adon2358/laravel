<?php

namespace App\Services;

use App\Model\MenuModel;
use App\Model\RoleResourceModel;
use App\Model\ButtonModel;

class MenuService
{

    /*
     * 菜单表数据
     */
    public function serviceAllMenu()
    {
        $menuModel = new MenuModel();
        $data = $menuModel->getAllMenu()->toarray();

        return $data;
    }

    /*
     * 添加权限
     */
    public function serviceAddMenu($data)
    {
        $arr = [
            'text' => $data['text'],
            'url' => $data['url'],
            'is_menu' => $data['is_menu'],
        ];
        $menuModel = new MenuModel();
        $res = $menuModel->getMenuUserInfo($arr['text']);
        if($res)
        {
            return false;
        }
        $data = $menuModel->addMenu($arr);

        return $data;
    }

    /*
     * 删除权限
     */
    public function serviceDelMenu($m_id)
    {
        $menuModel = new MenuModel();
        $res = $menuModel->delMenu($m_id);
        $roleResource = new RoleResourceModel();
        $roleResource->menuIdDelRoleResourceId($m_id);
        $button = new ButtonModel();
        $button->menuIdDelButton($m_id);

        return $res;
    }

    /*
     * 查询出修改的那一条
     */
    public function serviceUpMenuFirst($m_id)
    {
        $menuModel = new MenuModel();
        $res = $menuModel->getUpMenu($m_id);

        return $res;
    }

    /*
     * 处理修改数据
     */
    public function serviceUpDoMenuFirst($data)
    {
        $m_id = $data['m_id'];
        $arr = [
            'text' => $data['text'],
            'url' => $data['url'],
            'p_id' => $data['p_id'],
            'is_menu' => $data['is_menu'],
        ];
        $menuModel = new MenuModel();
        $res = $menuModel->getUpDoMenu($arr,$m_id);

        return $res;
    }


}