<?php

namespace App\Services;

use App\Model\AttrvalueModel;

class AttrvalueService
{
    /*
     * 属性列表
     */
    public function serviceAttrvalueList()
    {
        $attrvalueModel = new AttrvalueModel();
        $data = $attrvalueModel->getAllAttrvalue()->toarray();

        return $data;
    }

    /*
     * 删除属性值
     */
    public function serviceDelAttrvalue($attr_value_id)
    {
        $attrvalueModel = new AttrvalueModel();
        $data = $attrvalueModel->delFirstAttrvalue($attr_value_id);

        return $data;
    }

    /*
     * 添加属性值
     * return 1  添加成功
     * return 2  此属性值名已存在
     * return 3  添加失败
     */
    public function serviceAttrvalueAdd($data)
    {
        $arr = [
            'attr_value_name' => $data['attr_value_name'],
            'attr_id' => $data['attr_id'],
            'is_delete' => 1,
        ];
        //检查表中是否有同名属性
        $AttrvalueModel = new AttrvalueModel();
        $attrvalueExist = $AttrvalueModel->attrvalueNameExist($arr['attr_value_name']);
        if($attrvalueExist)
        {
            return 2;
        }else{
            $res = $AttrvalueModel->addAttrvalue($arr);
            if($res){
                return 1;
            } else {
                return 3;
            }
        }
    }

    /*
    * 查出修改的那一条商品
    */
    public function serviceUpAttrvalueFirst($attr_value_id)
    {
        $attrvalueModel = new AttrvalueModel();
        $upAttrvalueFirst = $attrvalueModel->upAttrvalueFirst($attr_value_id)->toarray();

        return $upAttrvalueFirst;
    }

    /*
     * 处理修改数据
     */
    public function serviceUpDoAttrvalueFirst($data)
    {
        $attr_value_id = $data['attr_value_id'];
        $arr = [
            'attr_value_name' => $data['attr_value_name'],
            'attr_id' => $data['attr_id'],
        ];
        $attrvalueModel = new AttrvalueModel();
        $upAttrvalueFirst = $attrvalueModel->upFirstAttrvalue($arr,$attr_value_id);

        return $upAttrvalueFirst;
    }

}
