<?php

namespace App\Services;

use app\admin\model\Cate;
use App\Model\CategoryModel;

class CategoryService
{
    /*
     * 分类列表
     */
    public function serviceCategoryList()
    {
        $categoryModel = new CategoryModel();
        $data = $categoryModel->getAllCategory()->toarray();

        return $data;
    }

    /*
     * 删除分类
     */
    public function serviceDelCategory($cat_id)
    {
        $categoryModel = new CategoryModel();
        $data = $categoryModel->delFirstCategory($cat_id);

        return $data;
    }

    /*
     * 添加分类
     * return 1  添加成功
     * return 2  此分类名已存在
     * return 3  添加失败
     */
    public function serviceCategoryAdd($data)
    {
        $arr = [
            'cat_name' => $data['cat_name'],
            'p_id' => $data['p_id'],
        ];
        //检查表中是否有同名品牌
        $categoryModel = new CategoryModel();
        $categoryExist = $categoryModel->categoryNameExist($arr['cat_name']);
        if($categoryExist)
        {
            return 2;
        }else{
            $res = $categoryModel->addCategory($arr);
            if($data['p_id'] == 0){
                $path = $res;
            }else{
                $path = $data['p_id'].'-'.$res;
            }
            $data = $categoryModel->addCategoryPath($path,$res);
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
    public function serviceUpCategoryFirst($cat_id)
    {
        $categoryModel = new CategoryModel();
        $upCategoryFirst = $categoryModel->upCategoryFirst($cat_id)->toarray();

        return $upCategoryFirst;
    }

    /*
     * 处理修改数据
     */
    public function serviceUpDoCategoryFirst($data)
    {
        $cat_id = $data['cat_id'];
        $arr = [
            'cat_name' => $data['cat_name'],
            'p_id' => $data['p_id'],
        ];
        if($data['p_id'] == 0){
            $arr['path'] = $cat_id;
        }else{
            $arr['path'] = $data['p_id'].'-'.$cat_id;
        }
        $categoryModel = new CategoryModel();
        $upBrandFirst = $categoryModel->upFirstCategory($arr,$cat_id);

        return $upBrandFirst;
    }

}
