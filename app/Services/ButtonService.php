<?php

namespace App\Services;

use App\Model\ButtonModel;

class ButtonService
{

    /*
     * 按钮表数据
     */
    public function serviceAllButton()
    {
        $buttonModel = new ButtonModel();
        $data = $buttonModel->getAllButton()->toarray();

        return $data;
    }

    /*
     * 添加角色
     */
    public function serviceAddButton($data)
    {
        $arr = [
            'b_name' => $data['b_name'],
            'b_url' => $data['b_url'],
            'm_id' => $data['m_id'],
        ];
        $buttonModel = new ButtonModel();
        $res = $buttonModel->getButtonUserInfo($arr['b_name']);
        if($res)
        {
            return false;
        }
        $data = $buttonModel->addButton($arr);

        return $data;
    }

    /*
     * 删除角色
     */
    public function serviceDelButton($b_id)
    {
        $buttonModel = new ButtonModel();
        $res = $buttonModel->delButton($b_id);

        return $res;
    }

    /*
     * 查询出修改的那一条
     */
    public function serviceUpButtonFirst($b_id)
    {
        $buttonModel = new ButtonModel();
        $res = $buttonModel->getUpButton($b_id);

        return $res;
    }

    /*
     * 处理修改数据
     */
    public function serviceUpDoButtonFirst($data)
    {
        $b_id = $data['b_id'];
        $arr = [
            'b_name' => $data['b_name'],
            'b_url' => $data['b_url'],
            'm_id' => $data['m_id'],
        ];
        $buttonModel = new ButtonModel();
        $res = $buttonModel->getUpDoButton($arr,$b_id);

        return $res;
    }


}