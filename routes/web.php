<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Index\IndexController@index');

Route::get('/php',function(){
    phpinfo();
});
/*
 * IndexController
 */
//首页
Route::get('index/index','Index\IndexController@index');
//列表
Route::get('index/list/t_id/{t_id}','Index\IndexController@list');
//详情页
Route::get('index/details/goods_id/{goods_id}','Index\IndexController@details');

/*
 * CartController
 */
//购物车
Route::get('cart/cart','Index\CartController@cart');
//订单
Route::get('cart/order','Index\CartController@order');

/*
 * UserController
 */
//注册
Route::get('user/register','Index\UserController@register');
//处理注册
Route::post('user/registerDo','Index\UserController@registerDo');
//登录
Route::get('user/login','Index\UserController@login');
//处理登录
Route::post('user/loginDo','Index\UserController@loginDo');
//退出登录
Route::get('user/loginOut','Index\UserController@loginOut');
//登录日志
Route::get('user/loginLog','Index\UserController@loginLog');

//个人中心
Route::get('user/selfInfo','Index\UserController@selfInfo');


/*
 * 跳转提示路由
 */
Route::resource('/prompt','PromptController');

/*
 * 后台
 */
Auth::routes();

Route::get('/home', 'HomeController@index');

//登录
Route::get('admin/login', 'Admin\AdminController@login');
//处理登录
Route::post('admin/logindo', 'Admin\AdminController@loginDo');

Route::group(['middleware' => ['back'],'namespace' => 'Admin','prefix' => '/admin'],function(){
    //首页
    Route::get('/index', 'AdminController@index');
    //退出登录
    Route::post('/loginout', 'AdminController@loginOut');

    //展示管理员
    Route::get('/adminlist', 'AdminController@adminList');
    //添加管理员
    Route::get('/adminadd', 'AdminController@adminAdd');
    //处理添加数据
    Route::post('/adminadddo', 'AdminController@adminAddDo');
    //删除管理员
    Route::post('/admindel', 'AdminController@adminDel');
    //查出修改的那一条
    Route::get('/adminup/a_id/{a_id}', 'AdminController@adminUp');
    //修改数据
    Route::post('/adminupdo', 'AdminController@adminUpDo');
    //管理员冻结/解冻
    Route::post('/adminvalid', 'AdminController@adminValid');

});

/*
 * 角色
 */
Route::group(['namespace' => 'Admin','prefix' => '/role'],function(){

    //展示角色
    Route::get('/rolelist', 'RoleController@roleList');
    //添加角色
    Route::get('/roleadd', 'RoleController@roleAdd');
    //处理添加数据
    Route::post('/roleadddo', 'RoleController@roleAddDo');
    //删除角色
    Route::post('/roledel', 'RoleController@roleDel');
    //查出修改的那一条
    Route::get('/roleup/r_id/{r_id}', 'RoleController@roleUp');
    //修改数据
    Route::post('/roleupdo', 'RoleController@roleUpDo');

});

/*
 * 菜单（权限）
 */
Route::group(['namespace' => 'Admin','prefix' => '/menu'],function(){

    //展示按钮
    Route::get('/menulist', 'MenuController@menuList');
    //添加按钮
    Route::get('/menuadd', 'MenuController@menuAdd');
    //处理添加数据
    Route::post('/menuadddo', 'MenuController@menuAddDo');
    //删除按钮
    Route::post('/menudel', 'MenuController@menuDel');
    //查出修改的那一条
    Route::get('/menuup/m_id/{m_id}', 'MenuController@menuUp');
    //修改数据
    Route::post('/menuupdo', 'MenuController@menuUpDo');

});

/*
 * 按钮
 */
Route::group(['namespace' => 'Admin','prefix' => '/button'],function(){

    //展示按钮
    Route::get('/buttonlist', 'ButtonController@buttonList');
    //添加按钮
    Route::get('/buttonadd', 'ButtonController@buttonAdd');
    //处理添加数据
    Route::post('/buttonadddo', 'ButtonController@buttonAddDo');
    //删除按钮
    Route::post('/buttondel', 'ButtonController@buttonDel');
    //查出修改的那一条
    Route::get('/buttonup/b_id/{b_id}', 'ButtonController@buttonUp');
    //修改数据
    Route::post('/buttonupdo', 'ButtonController@buttonUpDo');

});

/*
 * 商品
 */
Route::group(['namespace' => 'Admin','prefix' => '/goods'],function(){

    //展示商品
    Route::get('/goodslist', 'GoodsController@goodsList');
    //添加商品
    Route::get('/goodsadd', 'GoodsController@goodsAdd');
    //处理添加数据
    Route::post('/goodsadddo', 'GoodsController@goodsAddDo');
    //删除商品
    Route::post('/goodsdel', 'GoodsController@goodsDel');
    //查出修改的那一条
    Route::get('/goodsup/goods_id/{goods_id}', 'GoodsController@goodsUp');
    //修改数据
    Route::post('/goodsupdo', 'GoodsController@goodsUpDo');
    //商品上架/下架
    Route::post('/goodsstatus', 'GoodsController@goodsStatus');
    //通过分类的id获取到对应的属性
    Route::post('/cateidgetattr', 'GoodsController@cateIdGetAttr');
    //通过属性的id获取到对应的属性值
    Route::post('/attridgetattrvalue', 'GoodsController@attrIdGetAttrvalue');
    //通过失焦事情添加自定义属性值
    Route::post('/addattrvaluename', 'GoodsController@addAttrValueName');
    //通过属性值id获取sku
    Route::post('/attridgetsku', 'GoodsController@attridGetSku');


});

/*
 * 分类
 */
Route::group(['namespace' => 'Admin','prefix' => '/category'],function(){

    //展示分类
    Route::get('/categorylist', 'CategoryController@categoryList');
    //添加分类
    Route::get('/categoryadd', 'CategoryController@categoryAdd');
    //处理添加数据
    Route::post('/categoryadddo', 'CategoryController@categoryAddDo');
    //删除分类
    Route::post('/categorydel', 'CategoryController@categoryDel');
    //查出修改的那一条
    Route::get('/categoryup/cat_id/{cat_id}', 'CategoryController@categoryUp');
    //修改数据
    Route::post('/categoryupdo', 'CategoryController@categoryUpDo');
    //分类分配属性
    Route::post('/allotattribute', 'CategoryController@allotAttributeAdd');
    //分类分配属性
    Route::post('/allotattributeup', 'CategoryController@allotAttributeUp');


});

/*
 * 属性
 */
Route::group(['namespace' => 'Admin','prefix' => '/attribute'],function(){

    //展示属性
    Route::get('/attributelist', 'AttributeController@attributeList');
    //添加属性
    Route::get('/attributeadd', 'AttributeController@attributeAdd');
    //处理添加数据
    Route::post('/attributeadddo', 'AttributeController@attributeAddDo');
    //删除属性
    Route::post('/attributedel', 'AttributeController@attributeDel');
    //查出修改的那一条
    Route::get('/attributeup/attr_id/{attr_id}', 'AttributeController@attributeUp');
    //修改数据
    Route::post('/attributeupdo', 'AttributeController@attributeUpDo');

});

/*
 * 属性值
 */
Route::group(['namespace' => 'Admin','prefix' => '/attrvalue'],function(){

    //展示属性
    Route::get('/attrvaluelist', 'AttrvalueController@attrvalueList');
    //添加属性
    Route::get('/attrvalueadd', 'AttrvalueController@attrvalueAdd');
    //处理添加数据
    Route::post('/attrvalueadddo', 'AttrvalueController@attrvalueAddDo');
    //删除属性
    Route::post('/attrvaluedel', 'AttrvalueController@attrvalueDel');
    //查出修改的那一条
    Route::get('/attrvalueup/attr_value_id/{attr_value_id}', 'AttrvalueController@attrvalueUp');
    //修改数据
    Route::post('/attrvalueupdo', 'AttrvalueController@attrvalueUpDo');

});


Route::get('admin/test', 'Admin\AdminController@test');





