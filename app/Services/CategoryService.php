<?php

namespace App\Services;

use app\admin\model\Cate;
use App\Model\IndexTypeModel;

class CategoryService
{
    /*
     * 分类列表
     */
    public function serviceCategoryList()
    {
        $categoryModel = new IndexTypeModel();
        $data = $categoryModel->getAllCategory()->toarray();

        return $data;
    }

    /*
     * 删除分类
     */
    public function serviceDelCategory($t_id)
    {
        $categoryModel = new IndexTypeModel();
        $data = $categoryModel->delFirstCategory($t_id);

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
            't_name' => $data['t_name'],
            't_img' => $data['t_img'],
            'p_id' => $data['p_id'],
        ];
        //检查表中是否有同名品牌
        $categoryModel = new IndexTypeModel();
        $categoryExist = $categoryModel->categoryNameExist($arr['t_name']);
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
    public function serviceUpCategoryFirst($t_id)
    {
        $categoryModel = new IndexTypeModel();
        $upCategoryFirst = $categoryModel->upCategoryFirst($t_id)->toarray();

        return $upCategoryFirst;
    }

    /*
     * 处理修改数据
     */
    public function serviceUpDoCategoryFirst($data)
    {
        $t_id = $data['t_id'];
        $arr = [
            't_name' => $data['t_name'],
            't_img' => $data['t_img'],
            'p_id' => $data['p_id'],
        ];
        if($data['p_id'] == 0){
            $arr['path'] = $t_id;
        }else{
            $arr['path'] = $data['p_id'].'-'.$t_id;
        }
        $categoryModel = new IndexTypeModel();
        $upBrandFirst = $categoryModel->upFirstCategory($arr,$t_id);

        return $upBrandFirst;
    }

}
