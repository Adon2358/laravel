{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '分配属性')

@section('content_header')
    <h1>分配属性</h1>
@stop

@section('content')
    <form class="form-horizontal" action="{{url('category/allotattributeup')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="t_id" value="{{$cate['t_id']}}">
        <div class="box-body">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">分类名称</label>

                <div class="col-sm-10">
                    <input type="text" name="t_name" class="form-control" id="inputPassword3" value="{{$cate['t_name']}}" placeholder="分类名称">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">属性名称</label>

                <div class="col-sm-10">
                    @foreach($attribute as $k=>$v)
                    <input type="checkbox" name="attr_id[]" id="inputPassword3" value="{{$v['attr_id']}}" @if(in_array($v['attr_id'],$categoryAttribute)) checked @endif>{{$v['attr_name']}}
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="分配属性"></input>
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
