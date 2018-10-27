{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '修改商品')

@section('content_header')
    <h1>修改商品</h1>
@stop

@section('content')
    <form class="form-horizontal" action="{{url('goods/goodsupdo')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="goods_id" value="{{$data['goods_id']}}">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品名称</label>

                <div class="col-sm-10">
                    <input type="text" name="goods_name" class="form-control" id="inputPassword3" value="{{$data['goods_name']}}" placeholder="商品名称">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品库存</label>

                <div class="col-sm-10">
                    <input type="number" name="goods_number" class="form-control" value="{{$data['goods_number']}}" placeholder="商品库存">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品价格</label>

                <div class="col-sm-10">
                    <input type="text" name="goods_price" class="form-control" value="{{$data['goods_price']}}" placeholder="商品价格">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">促销价格</label>

                <div class="col-sm-10">
                    <input type="text" name="promotion_price" class="form-control" value="{{$data['promotion_price']}}" placeholder="促销价格">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品优惠</label>

                <div class="col-sm-10">
                    <input type="text" name="yh" class="form-control" value="{{$data['yh']}}" placeholder="商品优惠">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品描述</label>

                <div class="col-sm-10">
                    <input type="text" name="goods_desc" class="form-control" value="{{$data['goods_desc']}}" placeholder="商品描述">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品图片</label>

                <div class="col-sm-10">
                    <img src="{{URL::asset($data['goods_img'])}}" alt="" width="50px" height="50px">
                    <input type="file" name="goods_img" placeholder="商品图片">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">分类</label>

                <div class="col-sm-10">
                    <select name="t_id" id=""class="form-control" >
                        @foreach($category as $k => $v)
                            @if($v['t_id'] == $data['t_id'])
                                <option value="{{$v['t_id']}}" selected>{{$v['t_name']}}</option>
                            @endif
                            <option value="{{$v['t_id']}}">{{$v['t_name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">属性</label>

                <div class="col-sm-10">
                    <select name="attr_id" id=""class="form-control" >
                        @foreach($attribute as $ke => $va)
                            @if($va['attr_id'] == $data['attr_id'])
                                <option value="{{$va['attr_id']}}" selected>{{$va['attr_name']}}</option>
                            @endif
                            <option value="{{$va['attr_id']}}">{{$va['attr_name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">属性值</label>

                <div class="col-sm-10">
                    <select name="attr_value_id" id=""class="form-control" >
                        @foreach($attrvalue as $key => $val)
                            @if($val['attr_value_id'] == $data['attr_value_id'])
                                <option value="{{$val['attr_value_id']}}" selected>{{$val['attr_value_name']}}</option>
                                @endif
                            <option value="{{$val['attr_value_id']}}">{{$val['attr_value_name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">是否销售</label>

                <div class="col-sm-10">
                    @if($data['is_sale'] == 1)
                        <input type="radio" name="is_sale" value="1" checked>上架
                        <input type="radio" name="is_sale" value="0">下架
                    @else
                        <input type="radio" name="is_sale" value="1" >上架
                        <input type="radio" name="is_sale" value="0" checked>下架
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">是否新品</label>

                <div class="col-sm-10">
                    @if($data['is_new'] == 1)
                        <input type="radio" name="is_new" value="1" checked>是
                        <input type="radio" name="is_new" value="0">否
                    @else
                        <input type="radio" name="is_new" value="1" >是
                        <input type="radio" name="is_new" value="0" checked>否
                    @endif
                </div>
            </div>

        </div>

        <!-- /.box-body -->
        <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="修改商品"></input>
        </div>
        <!-- /.box-footer -->
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
