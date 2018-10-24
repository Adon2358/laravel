<?php

namespace App\Services;

use App\Model\BrandModel;

class BrandService
{
    /*
     * 品牌列表
     */
    public function serviceBrandList()
    {
        $brandModel = new BrandModel();
        $data = $brandModel->getAllBrand()->toarray();

        return $data;
    }

    /*
     * 删除品牌
     */
    public function serviceDelBrand($brand_id)
    {
        $brandModel = new BrandModel();
        $data = $brandModel->delFirstBrand($brand_id);

        return $data;
    }

    /*
     * 添加品牌
     * return 1  添加成功
     * return 2  此品牌名已存在
     * return 3  添加失败
     */
    public function serviceBrandAdd($data)
    {
        $arr = [
           'brand_name' => $data['brand_name'],
            'brand_logo' => $data['brand_logo'],
        ];
        //检查表中是否有同名品牌
        $brandModel = new BrandModel();
        $brandExist = $brandModel->brandNameExist($arr['brand_name']);
        if($brandExist)
        {
            return 2;
        }else{
            $data = $brandModel->addBrand($arr);
            if($data)
            {
                return 1;
            }else{
                return 3;
            }
        }
    }

    /*
    * 查出修改的那一条商品
    */
    public function serviceUpBrandFirst($brand_id)
    {
        $brandModel = new BrandModel();
        $upBrandFirst = $brandModel->upBrandFirst($brand_id)->toarray();

        return $upBrandFirst;
    }

    /*
     * 处理修改数据
     */
    public function serviceUpDobrandFirst($data)
    {
        $brand_id = $data['brand_id'];
        $arr = [
            'brand_name' => $data['brand_name'],
            'brand_logo' => $data['brand_logo'],
        ];
        $brandModel = new BrandModel();
        $upBrandFirst = $brandModel->upFirstBrand($arr,$brand_id);

        return $upBrandFirst;
    }

}
