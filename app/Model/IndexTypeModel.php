<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class IndexTypeModel extends Model
{
    protected $table = 'index_type';

    public $timestamps = false;

    /*
     * 首页分类表
     */
    public function getType()
    {
        $getType = DB::table('index_type')->get();

        return $getType;
    }

    /*
     * 分类列表
     */
    public function getAllCategory()
    {
        $data = $this->get();

        return $data;
    }

    /*
     * 删除分类
     */
    public function delFirstCategory($t_id)
    {
        $data = $this->where('t_id',$t_id)->delete();

        return $data;
    }

    /*
    * 检查是否存在此品牌
    */
    public function categoryNameExist($t_name)
    {
        $data = $this->where('t_name',$t_name)->first();

        return $data;
    }

    /*
     * 添加此品牌
     */
    public function addCategory($arr)
    {
        $data = $this->insertGetId($arr);

        return $data;
    }

    /*
     * 添加path字段
     */
    public function addCategoryPath($path,$t_id)
    {
        $data = $this->where('t_id',$t_id)->update(['path'=>$path]);

        return $data;
    }

    /*
     * 查出一条数据
     */
    public function upCategoryFirst($t_id)
    {
        $data = $this->where('t_id',$t_id)->first();

        return $data;
    }

    /*
     * 修改数据
     */
    public function upFirstCategory($arr,$t_id)
    {
        $data = $this->where('t_id',$t_id)->update($arr);

        return $data;
    }

}