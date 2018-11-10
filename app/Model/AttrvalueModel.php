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
     * 添加此属性值
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
     * 根据属性id查出所对应的属性值
     */
    public function attrIdGetAttrvalue($attr_id)
    {
        $data = $this->where('attr_id',$attr_id)->where('is_delete',1)->get();

        return $data;
    }

    /*
     * 根据属性id删除所对应的属性值
     */
    public function delAttrIdAttrvalue($attr_id)
    {
        $data = $this->where('attr_id',$attr_id)->where('is_delete',1)->delete();

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

    /*
     * 根据属性值id获取sku数据
     */
    public function attrvalueIdGetSku($attr_value_id)
    {
        $data = $this->whereIn('attr_value_id',$attr_value_id)->get();

        return $data;
    }

    /*
     * 添加商品时根据属性id查出所对应的属性值
     */
    public function addAttrIdAttrvalue($attr_id)
    {
        $data = $this->where('attr_id',$attr_id)->where('is_delete',1)->select('attr_value_id')->get();

        return $data;
    }


}