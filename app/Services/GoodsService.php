<?php

namespace App\Services;

use App\Model\GoodsModel;

class GoodsService
{
    /*
     * 商品列表
     */
    public function serviceGoodsList()
    {
        $goodsModel = new GoodsModel();
        $data = $goodsModel->getAllGoods()->toarray();

        return $data;
    }

    /*
     * 添加商品
     */
    public function serviceGoodsAdd($data)
    {
        $arr = [
            'cat_id' => $data['cat_id'],
            'goods_sn' => rand(1000,9000).time(),
            'goods_name' => $data['goods_name'],
            'brand_id' => $data['brand_id'],
            'goods_number' => $data['goods_number'],
            'market_price' => $data['market_price'],
            'shop_price' => $data['shop_price'],
            'goods_desc' => $data['goods_desc'],
            'goods_img' => $data['goods_img'],
            'add_time' => time(),
            'is_top_down' => $data['is_top_down'],
        ];
        //检查表中是否有同名商品有则库存相加
        $goodsModel = new GoodsModel();
        $goodsExist = $goodsModel->goodsNameExist($arr['goods_name']);
        if($goodsExist)
        {
            $data = $goodsModel->updateGoods($goodsExist,$arr);
        }else{
            $data = $goodsModel->addGoods($arr);
        }

        return $data;
    }

    /*
     * 删除商品
     */
    public function serviceDelGoods($goods_id)
    {
        $goodsModel = new GoodsModel();
        $data = $goodsModel->delFirstGoods($goods_id);

        return $data;
    }

    /*
     * 查出修改的那一条商品
     */
    public function serviceUpGoodsFirst($goods_id)
    {
        $goodsModel = new GoodsModel();
        $upGoodsFirst = $goodsModel->getUpStatusGoods($goods_id)->toarray();

        return $upGoodsFirst;
    }

    /*
     * 处理修改数据
     */
    public function serviceUpDoGoodsFirst($data)
    {
        $goods_id = $data['goods_id'];
        $arr = [
            'cat_id' => $data['cat_id'],
            'goods_name' => $data['goods_name'],
            'brand_id' => $data['brand_id'],
            'goods_number' => $data['goods_number'],
            'market_price' => $data['market_price'],
            'shop_price' => $data['shop_price'],
            'goods_desc' => $data['goods_desc'],
            'goods_img' => $data['goods_img'],
            'add_time' => time(),
            'is_top_down' => $data['is_top_down'],
        ];
        $goodsModel = new GoodsModel();
        $upGoodsFirst = $goodsModel->upFirstGoods($arr,$goods_id);

        return $upGoodsFirst;
    }

    /*
     * 上架/下架
     */
    public function serviceGoodsStatus($goods_id)
    {
        $goodsModel = new GoodsModel();
        //查出那一条数据
        $res = $goodsModel->getUpStatusGoods($goods_id)->toarray();
        if($res['is_top_down'] == 1)
        {
            $data = $goodsModel->goodsDown($goods_id);
            return $data;
        }else{
            $data = $goodsModel->goodsTop($goods_id);
            return $data;
        }
    }
}
