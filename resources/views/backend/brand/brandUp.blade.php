{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '修改商品')

@section('content_header')
    <h1>修改商品</h1>
@stop

@section('content')
    <form class="form-horizontal" action="{{url('brand/brandupdo')}}" method="post">
        <input type="hidden" name="brand_id" value="{{$data['brand_id']}}">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">品牌名称</label>

                <div class="col-sm-10">
                    <input type="text" name="brand_name" class="form-control" id="inputPassword3" value="{{$data['brand_name']}}" placeholder="品牌名称">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">品牌LoGo</label>

                <div class="col-sm-10">
                    <input type="text" name="brand_logo" class="form-control" value="{{$data['brand_logo']}}" placeholder="品牌logo">
                </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="修改品牌"></input>
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
