{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '修改分类')

@section('content_header')
    <h1>修改分类</h1>
@stop

@section('content')
    <form class="form-horizontal" action="{{url('category/categoryupdo')}}" method="post">
        <input type="hidden" name="t_id" value="{{$data['t_id']}}">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">分类名称</label>

                <div class="col-sm-10">
                    <input type="text" name="t_name" class="form-control" id="inputPassword3" value="{{$data['t_name']}}" placeholder="分类名称">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">上级分类</label>

                <div class="col-sm-10">
                    <select name="p_id" id="" class="form-control">
                        <option value="0">请选择</option>
                        @foreach($categoryAll as $k=>$v)
                            <option value="{{$v['t_id']}}">{{$v['t_name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">分类图片</label>

                <div class="col-sm-10">
                    <input type="text" name="t_img" class="form-control" id="inputPassword3"  placeholder="分类图片">
                </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="修改分类"></input>
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
