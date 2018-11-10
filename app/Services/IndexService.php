<?php
namespace App\Services;

use App\Model\NavigationModel;
use App\Model\GoodsModel;
use App\Model\CategoryModel;
use Illuminate\Support\Facades\Redis;

class IndexService
{
    public $navigationModel;
    public $goodsModel;
    public $categoryModel;

    public function __construct()
    {
        $this->navigationModel = new NavigationModel();
        $this->goodsModel = new GoodsModel();
        $this->categoryModel = new CategoryModel();
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
            $singleGoods= $this->goodsModel->getModelShopStatus(1);
            //shop配件
            $partGoods = $this->goodsModel->getModelShopStatus(2,10);
            //首页分类
            $getType =  $this->categoryModel->getType();
            $tree = $this->Tree($getType);
            $navigation['singleGoods'] = $singleGoods;
            $navigation['partGoods'] = $partGoods;
            $navigation['indexType'] = $tree;

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

    /*
     * 无限极分类
     */
    public function Tree($arr,$path=0)
    {
        $arr = $this->objectToArray($arr);
        $data = [];
        foreach ($arr as $key=>$v)
        {
            foreach($v as $k=>$val)
            {
                if($val['p_id'] == $path)
                {
                    $data[$k] = $val;
                    $data[$k]['son'] = $this->Tree($arr,$val['t_id']);
                }
            }
        }

        return $data;
    }

    /*
     * 对象转数组
     */
    public function objectToArray($arr)
    {
        $e = (array)$arr;
        foreach ($e as $k => $v) {
            if (gettype($v) == 'resource') return;
            if (gettype($v) == 'object' || gettype($v) == 'array')
                $e[$k] = (array)$this->objectToArray($v);
        }

        return $e;
    }

}
