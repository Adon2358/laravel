{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '修改商品')

@section('content_header')
    <h1>修改商品</h1>
@stop

@section('content')
    <form class="form-horizontal" action="{{url('goods/goodsupdo')}}" method="post">
        <input type="hidden" name="goods_id" value="{{$data['id']}}">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">分类ID</label>

                <div class="col-sm-10">
                    <select name="cat_id" id=""class="form-control" >
                        @foreach($category as $k => $v)
                            <option value="{{$v['cat_id']}}">{{$v['cat_name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品名称</label>

                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="inputPassword3" value="{{$data['name']}}" placeholder="商品名称">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">品牌ID</label>

                <div class="col-sm-10">
                    <select name="brand_id" id="" class="form-control" >
                        @foreach($brand as $key => $value)
                            <option value="{{$value['brand_id']}}">{{$value['brand_name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品库存</label>

                <div class="col-sm-10">
                    <input type="number" name="number" class="form-control" value="{{$data['number']}}" placeholder="商品库存">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品价格</label>

                <div class="col-sm-10">
                    <input type="text" name="price" class="form-control" value="{{$data['price']}}" placeholder="商品价格">
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
                    <input type="text" name="desc" class="form-control" value="{{$data['desc']}}" placeholder="商品描述">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">评论条数</label>

                <div class="col-sm-10">
                    <input type="text" name="comment" class="form-control" value="{{$data['comment']}}" placeholder="评论条数">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品图片</label>

                <div class="col-sm-10">
                    <input type="text" name="img" class="form-control" placeholder="商品图片">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品状态</label>

                <div class="col-sm-10">
                    @if($data['is_top_down'] == 1)
                        <input type="radio" name="is_top_down" value="1" checked>上架
                        <input type="radio" name="is_top_down" value="0">下架
                    @else
                        <input type="radio" name="is_top_down" value="1" >上架
                        <input type="radio" name="is_top_down" value="0" checked>下架
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
