<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryAttributeModel extends Model
{

    protected $table = 'category_attribute';

    public $timestamps = false;

    /*
     * 根据分类id查出对应的分类属性
     */
    public function getCateIdCategoryAttribute($t_id)
    {
        $data = $this->where('t_id',$t_id)->get();

        return $data;
    }

    /*
     * 根据分类id删除对应的分类属性
     */
     public function delCategoryAttribute($t_id)
     {
         $data = $this->where('t_id',$t_id)->delete();

         return $data;
     }

    /*
     *添加分类属性表
     */
    public function addCategoryAttribute($arr)
    {
        $data = $this->insert($arr);

        return $data;
    }

}