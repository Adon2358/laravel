<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GoodsModel extends Model
{
    protected $table = 'goods';

    public $timestamps = false;

    /*
     * 商品列表
     */
    public function getAllGoods()
    {
       $data = $this->get();

       return $data;
    }

    /*
     * 检查是否存在此商品
     */
    public function goodsNameExist($goods_name)
    {
        $data = $this->where('goods_name',$goods_name)->first();

        return $data;
    }

    /*
     * 更新此商品
     */
    public function updateGoods($goodsExist,$arr)
    {
        $data = $this->where('goods_name',$goodsExist->goods_name)->update([
            'goods_number' => $goodsExist->goods_number + $arr['goods_number'],
            'add_time' => $arr['add_time'],
        ]);

        return $data;
    }

    /*
     * 添加此商品
     */
    public function addGoods($arr)
    {
        $data = $this->insert($arr);

        return $data;
    }

    /*
     * 删除商品
     */
    public function delFirstGoods($goods_id)
    {
        $data = $this->where('goods_id',$goods_id)->delete();

        return $data;
    }

    /*
     * 查出要修改状态的那条信息
     */
    public function getUpStatusGoods($goods_id)
    {
        $data = $this->where('goods_id',$goods_id)->first();

        return $data;
    }

    /*
     * 修改数据
     */
    public function upFirstGoods($arr,$goods_id)
    {
        $data = $this->where('goods_id',$goods_id)->update($arr);

        return $data;
    }

    /*
     * 上架to下架
     */
    public function goodsDown($goods_id)
    {
        $data = $this->where('goods_id',$goods_id)->update([
            'is_top_down' => 0,
        ]);

        return $data;
    }

    /*
     *下架to上架
     */
    public function goodsTop($goods_id)
    {
        $data =  $this->where('goods_id',$goods_id)->update([
            'is_top_down' => 1,
        ]);

        return $data;
    }

}