<?php

namespace App\Services;

use App\Model\GoodsModel;
use App\Model\GoodsAttrModel;
use App\Model\AttrvalueModel;
use App\Model\SkuModel;
use DB;

class GoodsService
{
    /*
     * 商品列表
     */
    public function serviceGoodsList()
    {
        $goodsModel = new GoodsModel();
        $data = $goodsModel->getAllGoods();

        return $data;
    }

    /*
     * 添加商品
     */
    public function serviceGoodsAdd($request)
    {
        $data = $request->post();
        $attr_value_id = $data['attr_value_id'];
        $sku = [
            'sku_name' => $data['sku_name'],
            'sku_str' => $data['sku_str'],
            'sku_inventor' => $data['sku_inventor'],
            'sku_price' => $data['sku_price'],
        ];
        $skuList = [];
        foreach($sku as $k=>$v){
            foreach($v as $key=>$val){
                $skuList[$key][$k] = $val;
                $skuList[$key]['sku_no'] = rand(1000,9999).time();
                $skuList[$key]['create_time'] = time();
                $skuList[$key]['update_time'] = time();
            }
        }
        $fileName = $this->postFileupload($request);
        $arr = [
            'goods_name' => $data['goods_name'],
            'goods_number' => $data['goods_number'],
            'goods_price' => $data['goods_price'],
            'promotion_price' => $data['promotion_price'],
            'yh' => $data['yh'],
            'goods_desc' => $data['goods_desc'],
            't_id' => $data['t_id'],
            'is_sale' => $data['is_sale'],
            'goods_sn' => rand(1000,9000).time(),
            'goods_img' => $fileName,
            'create_time' => time(),
            'is_new' => $data['is_new'],
            'is_delete' => 1,
        ];
        $result = true;
        DB::beginTransaction();
        try{
            //检查表中是否有同名商品有则库存相加
            $goodsModel = new GoodsModel();
            $goodsExist = $goodsModel->goodsNameExist($arr['goods_name']);
            if($goodsExist)
            {
                $goodsModel->updateGoods($goodsExist,$arr);
            }else{
                $goods_id = $goodsModel->addGoods($arr);
                $attrAndAttrvalueId = [];
                foreach ($attr_value_id as $key => $value) {
                    foreach ($value as $k => $v) {
                        $attrAndAttrvalueId[] = [
                            'goods_id'=> $goods_id,
                            'attr_id'=>$key,
                            'attr_value_id'=>$v
                        ];
                    }
                }
                $goodsAttr = new GoodsAttrModel();
                $goodsAttr->addGoodsAttr($attrAndAttrvalueId);
                //添加sku
                $skuModel = new SkuModel();
                $skuModel->addSku($skuList);
            }
            DB::commit();
        }catch(\Exception $e){
            $result = false;
            $e->getMessage();
            DB::rollBack();
        }
        if($result){
            return true;
        }else{
            return false;
        }
    }
    //文件上传处理
    public function postFileupload($request){
        //判断请求中是否包含name=file的上传文件
        if(!$request->hasFile('goods_img')){
            exit('上传文件为空！');
        }
        $file = $request->file('goods_img');
        //判断文件上传过程中是否出错
        if(!$file->isValid()){
            exit('文件上传出错！');
        }
        $destPath = realpath(public_path('image'));
        if(!file_exists($destPath))
            mkdir($destPath,0755,true);
        $filename = $file->getClientOriginalName();
        if(!$file->move($destPath,$filename)){
            exit('保存文件失败！');
        }
        return './image'.'/'.$filename;
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
    public function serviceUpDoGoodsFirst($request)
    {
        $data = $request->post();
        $goods_id = $data['goods_id'];
        $fileName = $this->postFileupload($request);
        $arr = [
            'goods_name' => $data['goods_name'],
            'goods_number' => $data['goods_number'],
            'goods_price' => $data['goods_price'],
            'promotion_price' => $data['promotion_price'],
            'yh' => $data['yh'],
            'goods_desc' => $data['goods_desc'],
            't_id' => $data['t_id'],
            'attr_id' => $data['attr_id'],
            'attr_value_id' => $data['attr_value_id'],
            'is_sale' => $data['is_sale'],
            'goods_img' => $fileName,
            'update_time' => time(),
            'is_new' => $data['is_new'],
            'is_delete' => 1,
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
        $res = $goodsModel->getUpStatusGoods($goods_id);
        if($res['is_sale'] == 1)
        {
            $data = $goodsModel->goodsDown($goods_id);
            return $data;
        }else{
            $data = $goodsModel->goodsTop($goods_id);
            return $data;
        }
    }

    /*
     * 点击分类下的的子分类查出相对应的商品
     */
    public function serviceCateIdGetGoods($t_id)
    {
        $goodsModel = new GoodsModel();
        $goods = $goodsModel->CateIdGetGoods($t_id)->toarray();

        return $goods;
    }

}
