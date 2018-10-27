<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AttrvalueModel extends Model
{
    protected $table = 'attr_value';

    public $timestamps = false;


    /*
     * 属性值列表
     */
    public function getAllAttrvalue()
    {
        $data = $this->leftJoin('attribute','attr_value.attr_id','=','attribute.attr_id')->where('attr_value.is_delete',1)->get();

        return $data;
    }

    /*
     * 隐藏属性值
     */
    public function delFirstAttrvalue($attr_value_id)
    {
        $data = $this->where('attr_value_id',$attr_value_id)->update(['is_delete'=>0]);

        return $data;
    }


    /*
    * 检查是否存在此属性值
    */
    public function attrvalueNameExist($attr_value_name)
    {
        $data = $this->where('attr_value_name',$attr_value_name)->first();

        return $data;
    }

    /*
     * 添加此分类
     */
    public function addAttrvalue($arr)
    {
        $data = $this->insert($arr);

        return $data;
    }

    /*
     * 查出一条数据
     */
    public function upAttrvalueFirst($attr_value_id)
    {
        $data = $this->where('attr_value_id',$attr_value_id)->first();

        return $data;
    }

    /*
     * 修改数据
     */
    public function upFirstAttrvalue($arr,$attr_value_id)
    {
        $data = $this->where('attr_value_id',$attr_value_id)->update($arr);

        return $data;
    }



}