{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '修改属性')

@section('content_header')
    <h1>修改属性</h1>
@stop

@section('content')
    <form class="form-horizontal" action="{{url('attribute/attributeupdo')}}" method="post">
        <input type="hidden" name="attr_id" value="{{$data['attr_id']}}">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">属性名称</label>

                <div class="col-sm-10">
                    <input type="text" name="attr_name" class="form-control" id="inputPassword3" value="{{$data['attr_name']}}" placeholder="属性名称">
                </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="修改属性"></input>
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
