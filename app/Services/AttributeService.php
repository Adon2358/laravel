<?php

namespace App\Services;

use App\Model\AttributeModel;
use App\Model\AttrvalueModel;
use DB;

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
     * return 3  添加属性值失败
     */
    public function serviceAttributeAdd($data)
    {
        $arr = [
            'attr_name' => $data['attr_name'],
            'is_delete' => 1,
        ];
        $attrValue = explode(' ',$data['attr_value_name']);
        //检查表中是否有同名属性
        $attributeModel = new AttributeModel();
        $attributeExist = $attributeModel->categoryNameExist($arr['attr_name']);
        if($attributeExist)
        {
            return 2;
        }else{
            $attr_id = $attributeModel->addAttribute($arr);
            foreach($attrValue as $k=>$v)
            {
                $attrvalue[] = [
                    'attr_id' => $attr_id,
                    'attr_value_name' => $v,
                    'is_delete' => 1,
                ];
            }
            $attrvalueModel = new AttrvalueModel();
            $data = $attrvalueModel->addAttrvalue($attrvalue);
            if($data){
                return 1;
            }else{
                return 3;
            }

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
        $attrValue = explode(' ',$data['attr_value_name']);
        foreach($attrValue as $k=>$v)
        {
            $attrvalue[] = [
                'attr_id' => $attr_id,
                'attr_value_name' => $v,
                'is_delete' => 1,
            ];
        }
        $result = true;
        DB::beginTransaction();
        try{
            $attributeModel = new AttributeModel();
            $attributeModel->upFirstAttribute($arr,$attr_id);
            $attrvalueMode = new AttrvalueModel();
            $attrvalueMode->delAttrIdAttrvalue($attr_id);
            $attrvalueMode->addAttrvalue($attrvalue);
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
     * 根据attr_id查出对应的名称
     */
    public function serviceAttrIdGetAttributeName($attr_id)
    {
       $attributeModel = new AttributeModel();
       $attr_name = $attributeModel->attrIdGetAttributeName($attr_id)->toarray();

       return $attr_name;
    }

    /*
     * 添加商品时 添加自定义属性值
     *
     * 添加属性值
     * return 1  添加成功
     * return 2  此属性值名已存在
     * return 3  添加失败
     *
     */
    public function serviceGoodsAddAttrValue($data)
    {
        $arr = [
            'attr_value_name' => $data['attr_value_name'],
            'attr_id' => $data['attr_id'],
            'is_delete' => 1,
        ];
        //检查表中是否有同名属性值
        $AttrvalueModel = new AttrvalueModel();
        $attrvalueExist = $AttrvalueModel->attrvalueNameExist($arr['attr_value_name']);
        if($attrvalueExist)
        {
            return 2;
        }else{
            $attrValue = explode(' ',$data['attr_value_name']);
            foreach($attrValue as $k=>$v)
            {
                $attrvalue[] = [
                    'attr_id' => $arr['attr_id'],
                    'attr_value_name' => $v,
                    'is_delete' => 1,
                ];
            }
            $res = $AttrvalueModel->addAttrvalue($attrvalue);
            if($res){
                return 1;
            } else {
                return 3;
            }
        }
    }

}
