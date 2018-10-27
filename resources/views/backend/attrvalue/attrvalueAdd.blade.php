{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '添加属性值')

@section('content_header')
    <h1>添加属性值</h1>
@stop

@section('content')
    <form class="form-horizontal" action="{{url('attrvalue/attrvalueadddo')}}" method="post">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">属性值名称</label>

                <div class="col-sm-10">
                    <input type="text" name="attr_value_name" class="form-control" id="inputPassword3" placeholder="属性值名称">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">属性</label>

                <div class="col-sm-10">
                        <select name="attr_id" id="" class="form-control">
                            @foreach($data as $k=>$v)
                            <option value="{{$v['attr_id']}}">{{$v['attr_name']}}</option>
                            @endforeach
                        </select>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="添加属性值"></input>
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
