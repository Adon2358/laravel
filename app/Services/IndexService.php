<?php
namespace App\Services;

use App\Model\NavigationModel;
use App\Model\ShopModel;
use App\Model\IndexTypeModel;
use Illuminate\Support\Facades\Redis;

class IndexService
{
    public $navigationModel;
    public $shopModel;
    public $indexTypeModel;

    public function __construct()
    {
        $this->navigationModel = new NavigationModel();
        $this->shopModel = new ShopModel();
        $this->indexTypeModel = new IndexTypeModel();
    }

    /*
     * 首页
     */
    public function serviceIndex()
    {
        if(!Redis::get('data')) {
            //导航

            $navigation = $this->navigationModel->navigationModel();
            //shop小米明星单品
            $singleGoods= $this->shopModel->getModelShopStatus(1);
            //shop配件
            $shopModel = new ShopModel();
            $partGoods = $this->shopModel->getModelShopStatus(2);
            //首页分类
            $indexType =  $this->indexTypeModel->getIndexType(2);

            $navigation['singleGoods'] = $singleGoods;
            $navigation['partGoods'] = $partGoods;
            $navigation['indexType'] = $indexType;

            $str = json_encode($navigation);
            $data = Redis::set('data',$str);

            return  $navigation;
        }else {
//            Redis::del('data');
            $data = Redis::get('data');
            $result = json_decode($data,true);

            return $result;
        }


    }
}