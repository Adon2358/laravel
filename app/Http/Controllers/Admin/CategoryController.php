<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /*
     * 分类列表
     */
    public function categoryList()
    {
        $categoryService = new CategoryService();
        $data = $categoryService->serviceCategoryList();

        return view('backend.category.categoryList',['data'=>$data]);
    }

    /*
     * 添加分类
     */
    public function categoryAdd()
    {
        $categoryService = new CategoryService();
        $data = $categoryService->serviceCategoryList();

        return view('backend.category.categoryadd',['data'=>$data]);
    }

    /*
     * 处理添加数据
     * return 1  添加成功
     * return 2  此分类名已存在
     * return 3  添加失败
     */
    public function categoryAddDo(Request $request)
    {
        $data = $request->post();
        $categoryService = new CategoryService();
        $data = $categoryService->serviceCategoryAdd($data);
        switch ($data)
        {
            case 1:
                return redirect('/prompt')->with([
                    'message'=>'添加成功！',
                    'url' =>'category/categorylist',
                    'jumpTime'=>3,
                    'status'=>true,
                ]);
                break;
            case 2:
                return redirect('/prompt')->with([
                    'message'=>'此分类已存在！',
                    'url' =>'category/categorylist',
                    'jumpTime'=>3,
                    'status'=>false,
                ]);
                break;
            case 3:
                return redirect('/prompt')->with([
                    'message'=>'添加失败！',
                    'url' =>'category/categorylist',
                    'jumpTime'=>3,
                    'status'=>false,
                ]);
                break;
            default:break;
        }
    }

    /*
     * 删除分类
     */
    public function categoryDel(Request $request)
    {
        $cat_id = $request->post('cat_id');
        $categoryService = new CategoryService();
        $data = $categoryService->serviceDelCategory($cat_id);
        if($data){
            return $this->categoryList();
        } else {
            return 2;
        }
    }

    /*
     * 查出修改的那一条
     */
    public function categoryUp($cat_id)
    {
        $categoryService = new CategoryService();
        $data = $categoryService->serviceUpCategoryFirst($cat_id);
        $categoryAll = $categoryService->serviceCategoryList();

        return view('backend.category.categoryup',['data'=>$data,'categoryAll' => $categoryAll]);
    }

    /*
     * 处理修改分类数据
     */
    public function categoryUpDo(Request $request)
    {
        $data = $request->post();
        $categoryService = new CategoryService();
        $res = $categoryService->serviceUpDoCategoryFirst($data);
        if($res) {
            return redirect('/prompt')->with([
                'message'=>'修改分类成功！',
                'url' =>'category/categorylist',
                'jumpTime'=>3,
                'status'=>true
            ]);
        } else {
            return redirect('/prompt')->with([
                'message'=>'修改分类失败！',
                'url' =>'category/categorylist',
                'jumpTime'=>3,
                'status'=>false
            ]);
        }
    }


}