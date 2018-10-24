<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'category';

    public $timestamps = false;

    /*
     * 分类列表
     */
    public function getAllCategory()
    {
        $data = $this->get();

        return $data;
    }

    /*
     * 删除分类
     */
    public function delFirstCategory($cat_id)
    {
        $data = $this->where('cat_id',$cat_id)->delete();

        return $data;
    }

    /*
    * 检查是否存在此品牌
    */
    public function categoryNameExist($cat_name)
    {
        $data = $this->where('cat_name',$cat_name)->first();

        return $data;
    }

    /*
     * 添加此品牌
     */
    public function addCategory($arr)
    {
        $data = $this->insertGetId($arr);

        return $data;
    }

    /*
     * 添加path字段
     */
    public function addCategoryPath($path,$cat_id)
    {
        $data = $this->where('cat_id',$cat_id)->update(['path'=>$path]);

        return $data;
    }

    /*
     * 查出一条数据
     */
    public function upCategoryFirst($cat_id)
    {
        $data = $this->where('cat_id',$cat_id)->first();

        return $data;
    }

    /*
     * 修改数据
     */
    public function upFirstCategory($arr,$cat_id)
    {
        $data = $this->where('cat_id',$cat_id)->update($arr);

        return $data;
    }


}