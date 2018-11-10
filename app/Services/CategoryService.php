<?php

namespace App\Services;

use App\Model\AttributeModel;
use App\Model\CategoryModel;
use App\Model\CategoryAttributeModel;
use Illuminate\Http\Request;
use DB;

class CategoryService
{
    /*
     * 分类列表
     */
    public function serviceCategoryList()
    {
        $categoryModel = new CategoryModel();
        $data = $categoryModel->getAllCategory()->toarray();

        return $data;
    }

    /*
     * 删除分类
     */
    public function serviceDelCategory($t_id)
    {
        $categoryModel = new CategoryModel();
        $data = $categoryModel->delFirstCategory($t_id);

        return $data;
    }

    /*
     * 添加分类
     * return 1  添加成功
     * return 2  此分类名已存在
     * return 3  添加失败
     */
    public function serviceCategoryAdd($request)
    {
        $data = $request->input();
        $fileName = $this->postFileupload($request);

        $arr = [
            't_name' => $data['t_name'],
            't_img' => $fileName,
            'p_id' => $data['p_id'],
            'is_delete' => 1,
        ];
        //检查表中是否有同名品牌
        $categoryModel = new CategoryModel();
        $categoryExist = $categoryModel->categoryNameExist($arr['t_name']);
        if($categoryExist)
        {
            return 2;
        }else{
            $res = $categoryModel->addCategory($arr);
            if($data['p_id'] == 0){
                $path = $res;
            }else{
                $path = $data['p_id'].'-'.$res;
            }
            $data = $categoryModel->addCategoryPath($path,$res);
            if($data){
                return 1;
            }else{
                return 3;
            }
        }
    }

    //文件上传处理
    public function postFileupload($request){
        //判断请求中是否包含name=file的上传文件
        if(!$request->hasFile('t_img')){
            exit('上传文件为空！');
        }
        $file = $request->file('t_img');
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
    * 查出修改的那一条商品
    */
    public function serviceUpCategoryFirst($t_id)
    {
        $categoryModel = new CategoryModel();
        $upCategoryFirst = $categoryModel->upCategoryFirst($t_id)->toarray();

        return $upCategoryFirst;
    }

    /*
     * 处理修改数据
     */
    public function serviceUpDoCategoryFirst($request)
    {
        $data = $request->post();
        $fileName = $this->postFileupload($request);
        $t_id = $data['t_id'];
        $arr = [
            't_name' => $data['t_name'],
            't_img' => $fileName,
            'p_id' => $data['p_id'],
        ];
        if($data['p_id'] == 0){
            $arr['path'] = $t_id;
        }else{
            $arr['path'] = $data['p_id'].'-'.$t_id;
        }
        $categoryModel = new CategoryModel();
        $upBrandFirst = $categoryModel->upFirstCategory($arr,$t_id);

        return $upBrandFirst;
    }

    /*
     * 分类属性
     */
    public function serviceAllotAttribute($t_id)
    {
        $categoryModel = new CategoryModel();
        $cate = $categoryModel->upCategoryFirst($t_id)->toarray();

        return $cate;
    }

    /*
     * 修改分类属性
     */
    public function serviceUpAllotAttribute($data)
    {
        $t_id =  $data['t_id'];
        $attrId = $data['attr_id'];
        $arr = [];
        foreach ($attrId as $k=>$v)
        {
            $arr[] = [
                't_id' => $t_id,
                'attr_id' => $v,
            ];
        }
        $result = true;
        DB::beginTransaction();
        try{
            $cateAttributeModel = new CategoryAttributeModel();
            $cateAttributeModel->delCategoryAttribute($t_id);
            $cateAttributeModel->AddCategoryAttribute($arr);
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

}
