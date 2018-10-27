<?php
namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class GoodsModel extends Model
{

    protected $table = 'goods';

    public $timestamps = false;

    /*
     * shop表
     * 根据状态查出相对应的商品
     */
    public function getModelShopStatus($status,$limit = 5)
    {
        $shop = $this->where('status',$status)->where('is_delete',1)->orderBy('create_time','desc')->limit($limit)->get();

        return $shop;
    }

    /*
     * 商品列表
     */
    public function getAllGoods()
    {
        $data = $this ->leftJoin('category','goods.t_id','=','category.t_id')
                      ->where('goods.is_delete',1)
                      ->orderby('goods_id','desc')
                      ->paginate(5);

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
            'update_time' => $arr['create_time'],
        ]);

        return $data;
    }

    /*
     * 添加此商品
     */
    public function addGoods($arr)
    {
        $data = $this->insertGetId($arr);

        return $data;
    }

    /*
     * 删除商品(假删除)
     */
    public function delFirstGoods($goods_id)
    {
        $data = $this->where('goods_id',$goods_id)->update(['is_delete'=>0]);

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
            'is_sale' => 0,
        ]);

        return $data;
    }

    /*
     *下架to上架
     */
    public function goodsTop($goods_id)
    {
        $data =  $this->where('goods_id',$goods_id)->update([
            'is_sale' => 1,
        ]);

        return $data;
    }

}