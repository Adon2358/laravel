<?php

namespace App\Services;

use App\Model\ShopModel;

class GoodsService
{
    /*
     * 商品列表
     */
    public function serviceGoodsList()
    {
        $goodsModel = new ShopModel();
        $data = $goodsModel->getAllGoods();

        return $data;
    }

    /*
     * 添加商品
     */
    public function serviceGoodsAdd($data)
    {
        $arr = [
            'cat_id' => $data['cat_id'],
            'sn' => rand(1000,9000).time(),
            'name' => $data['name'],
            'brand_id' => $data['brand_id'],
            'number' => $data['number'],
            'price' => $data['price'],
            'desc' => $data['desc'],
            'img' => $data['img'],
            'add_time' => time(),
            'is_top_down' => $data['is_top_down'],
            'yh' => $data['yh'],
            'comment' => $data['comment'],
        ];
        //检查表中是否有同名商品有则库存相加
        $goodsModel = new ShopModel();
        $goodsExist = $goodsModel->goodsNameExist($arr['name']);
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
    public function serviceDelGoods($id)
    {
        $goodsModel = new ShopModel();
        $data = $goodsModel->delFirstGoods($id);

        return $data;
    }

    /*
     * 查出修改的那一条商品
     */
    public function serviceUpGoodsFirst($id)
    {
        $goodsModel = new ShopModel();
        $upGoodsFirst = $goodsModel->getUpStatusGoods($id)->toarray();

        return $upGoodsFirst;
    }

    /*
     * 处理修改数据
     */
    public function serviceUpDoGoodsFirst($data)
    {
        $id = $data['id'];
        $arr = [
            'cat_id' => $data['cat_id'],
            'name' => $data['name'],
            'brand_id' => $data['brand_id'],
            'number' => $data['number'],
            'price' => $data['price'],
            'desc' => $data['desc'],
            'img' => $data['img'],
            'add_time' => time(),
            'is_top_down' => $data['is_top_down'],
        ];
        $goodsModel = new ShopModel();
        $upGoodsFirst = $goodsModel->upFirstGoods($arr,$id);

        return $upGoodsFirst;
    }

    /*
     * 上架/下架
     */
    public function serviceGoodsStatus($id)
    {
        $goodsModel = new ShopModel();
        //查出那一条数据
        $res = $goodsModel->getUpStatusGoods($id)->toarray();
        if($res['is_top_down'] == 1)
        {
            $data = $goodsModel->goodsDown($id);
            return $data;
        }else{
            $data = $goodsModel->goodsTop($id);
            return $data;
        }
    }
}
