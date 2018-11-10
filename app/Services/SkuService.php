<?php

namespace App\Services;

use App\Model\SkuModel;
use App\Model\AttrvalueModel;

class SkuService
{
    /*
     * 根据属性值ID查出属性并分类
     */
    public function serviceAttrValueIdGetSkuList($data)
    {
      $attr_value_id =  $data['attr_value_id'];
      $attrvalueModel = new AttrvalueModel();
      $data = $attrvalueModel->attrvalueIdGetSku($attr_value_id);
      foreach ($data as $k=>$v) {
          $attr_id[] = $v['attr_id'];
      }
      $attrId = array_unique($attr_id);
      $skuList = [];
      foreach ($attrId as $key=>$va) {
          foreach ($data as $ke=>$val) {
              if($va == $val['attr_id']){
                  $skuList[$va][] = $val['attr_value_id'];
              }
          }
      }
      $sku = $this->CartesianProduct(array_values($skuList));

      foreach ($sku as $key=>$v){
          $ids = explode(',',$v);
          $attr_value_name[] = AttrvalueModel::whereIn('attr_value_id',$ids)->get();
          foreach($attr_value_name as $k=>$value){
              $idstr = '';
              $valstr = '';
              foreach($value as $ke=>$item){
                  $idstr .= ','.$item['attr_value_id'];
                  $valstr .= ','.$item['attr_value_name'];
              }
          }
          $result[] = [
              'idstr' => ltrim($idstr,','),
              'valstr' => ltrim($valstr,','),
          ];
      }

      return $result;
    }

    /**
     * 计算多个集合的笛卡尔积
     */
    public function CartesianProduct($data){
        // 保存结果
        $result = array();
        // 循环遍历集合数据
        for($i=0,$count=count($data); $i<$count-1; $i++){
            // 初始化
            if($i==0){
                $result = $data[$i];
            }
            // 保存临时数据
            $tmp = array();
            // 结果与下一个集合计算笛卡尔积
            foreach($result as $res){
                foreach($data[$i+1] as $set){
                    $tmp[] = $res.','.$set;
                }
            }
            // 将笛卡尔积写入结果
            $result = $tmp;
        }
        return $result;
    }

}