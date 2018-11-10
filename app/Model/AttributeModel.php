<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AttributeModel extends Model
{
    protected $table = 'attribute';

    public $timestamps = false;


    /*
     * 属性列表
     */
    public function getAllAttribute()
    {
        $data = $this->where('is_delete',1)->get();

        return $data;
    }

    /*
     * 隐藏属性
     */
    public function delFirstAttribute($attr_id)
    {
        $data = $this->where('attr_id',$attr_id)->update(['is_delete'=>0]);

        return $data;
    }


    /*
    * 检查是否存在此品牌
    */
    public function categoryNameExist($attr_name)
    {
        $data = $this->where('attr_name',$attr_name)->first();

        return $data;
    }

    /*
     * 添加此分类
     */
    public function addAttribute($arr)
    {
        $data = $this->insertGetId($arr);

        return $data;
    }

    /*
     * 查出一条数据
     */
    public function upAttributeFirst($attr_id)
    {
        $data = $this->where('attr_id',$attr_id)->first();

        return $data;
    }

    /*
     * 修改数据
     */
    public function upFirstAttribute($arr,$attr_id)
    {
        $data = $this->where('attr_id',$attr_id)->update($arr);

        return $data;
    }

    /*
     * 根据关系表中的attr_id查出attribute表中对应的名称
     */
    public function attrIdGetAttributeName($attr_id)
    {
        $data = $this->whereIn('attr_id',$attr_id)->where('is_delete',1)->get();

        return $data;
    }



}