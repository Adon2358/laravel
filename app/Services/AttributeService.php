<?php

namespace App\Services;

use App\Model\AttributeModel;
use App\Model\CategoryModel;

class AttributeService
{
    /*
     * 属性列表
     */
    public function serviceAttributeList()
    {
        $attributeModel = new AttributeModel();
        $data = $attributeModel->getAllAttribute()->toarray();

        return $data;
    }

    /*
     * 删除属性
     */
    public function serviceDelAttribute($attr_id)
    {
        $attributeModel = new AttributeModel();
        $data = $attributeModel->delFirstAttribute($attr_id);

        return $data;
    }

    /*
     * 添加属性
     * return 1  添加成功
     * return 2  此属性名已存在
     * return 3  添加失败
     */
    public function serviceAttributeAdd($data)
    {
        $arr = [
            'attr_name' => $data['attr_name'],
        ];
        //检查表中是否有同名属性
        $attributeModel = new AttributeModel();
        $attributeExist = $attributeModel->categoryNameExist($arr['attr_name']);
        if($attributeExist)
        {
            return 2;
        }else{
            $attributeModel->addAttribute($arr);
            return 1;
        }
    }

    /*
    * 查出修改的那一条商品
    */
    public function serviceUpAttributeFirst($t_id)
    {
        $attributeModel = new AttributeModel();
        $upAttributeFirst = $attributeModel->upAttributeFirst($t_id)->toarray();

        return $upAttributeFirst;
    }

    /*
     * 处理修改数据
     */
    public function serviceUpDoAttributeFirst($data)
    {
        $attr_id = $data['attr_id'];
        $arr = [
            'attr_name' => $data['attr_name'],
        ];
        $attributeModel = new AttributeModel();
        $upAttributeFirst = $attributeModel->upFirstAttribute($arr,$attr_id);

        return $upAttributeFirst;
    }

}
