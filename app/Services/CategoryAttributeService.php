<?php

namespace App\Services;

use App\Model\CategoryAttributeModel;

class CategoryAttributeService
{
    /*
     * 根据分类id查出对应的分类属性
     */
    public function serviceAllCategoryAttributeList($t_id)
    {
        $categoryAttributeModel = new CategoryAttributeModel();
        $cateAttr = $categoryAttributeModel->getCateIdCategoryAttribute($t_id)->toarray();

        return $cateAttr;
    }

    /*
     * 根据分类id查出对应的属性Id
     */
    public function serviceCateIdAttrId($t_id)
    {
        $categoryAttributeModel = new CategoryAttributeModel();
        $cateAttr = $categoryAttributeModel->getCateIdCategoryAttribute($t_id)->toarray();
        $arr = [];
        foreach($cateAttr as $k=>$v)
        {
            $arr[] = $v['attr_id'];
        }

        return $arr;
    }
}