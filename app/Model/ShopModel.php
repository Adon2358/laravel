<?php
namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{

    protected $table = 'shop';

    public $timestamps = false;

    /*
     * shop表
     * 根据状态查出相对应的商品
     */
    public function getModelShopStatus($status)
    {
        $shop = DB::table('shop')->where('status',$status)->get();
        return $shop;

    }

    /*
     * 商品列表
     */
    public function getAllGoods()
    {
        $data = $this ->leftJoin('category','shop.cat_id','=','category.cat_id')
            ->leftJoin('brand','shop.brand_id','=','brand.brand_id')
            ->paginate(5);

        return $data;
    }

    /*
     * 检查是否存在此商品
     */
    public function goodsNameExist($name)
    {
        $data = $this->where('name',$name)->first();

        return $data;
    }

    /*
     * 更新此商品
     */
    public function updateGoods($goodsExist,$arr)
    {
        $data = $this->where('name',$goodsExist->name)->update([
            'number' => $goodsExist->number + $arr['number'],
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
    public function delFirstGoods($id)
    {
        $data = $this->where('id',$id)->delete();

        return $data;
    }

    /*
     * 查出要修改状态的那条信息
     */
    public function getUpStatusGoods($id)
    {
        $data = $this->where('id',$id)->first();

        return $data;
    }

    /*
     * 修改数据
     */
    public function upFirstGoods($arr,$id)
    {
        $data = $this->where('id',$id)->update($arr);

        return $data;
    }

    /*
     * 上架to下架
     */
    public function goodsDown($id)
    {
        $data = $this->where('id',$id)->update([
            'is_top_down' => 0,
        ]);

        return $data;
    }

    /*
     *下架to上架
     */
    public function goodsTop($id)
    {
        $data =  $this->where('id',$id)->update([
            'is_top_down' => 1,
        ]);

        return $data;
    }

}