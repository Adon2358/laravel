<?php
namespace App\Service;

use App\Model\IndexModel;

class IndexService
{
    /*
     * 首页
     */
    public function s_index()
    {
        $model = new IndexModel();
        $data = $model->m_index();
        $res = json_decode($data,true);
//        var_dump($res);die;
        return $res;
    }
}