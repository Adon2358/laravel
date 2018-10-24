<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    protected $table = 'brand';

    public $timestamps = false;

    /*
     * 品牌列表
     */
    public function getAllBrand()
    {
        $data = $this->get();

        return $data;
    }

    /*
     * 删除品牌
     */
    public function delFirstBrand($brand_id)
    {
        $data = $this->where('brand_id',$brand_id)->delete();

        return $data;
    }

    /*
    * 检查是否存在此品牌
    */
    public function brandNameExist($brand_name)
    {
        $data = $this->where('brand_name',$brand_name)->first();

        return $data;
    }

    /*
     * 添加此品牌
     */
    public function addBrand($arr)
    {
        $data = $this->insert($arr);

        return $data;
    }

    /*
     * 查出一条数据
     */
    public function upBrandFirst($brand_id)
    {
        $data = $this->where('brand_id',$brand_id)->first();

        return $data;
    }

    /*
     * 修改数据
     */
    public function upFirstBrand($arr,$brand_id)
    {
        $data = $this->where('brand_id',$brand_id)->update($arr);

        return $data;
    }


}