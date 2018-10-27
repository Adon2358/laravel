{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '修改属性值')

@section('content_header')
    <h1>修改属性值</h1>
@stop

@section('content')
    <form class="form-horizontal" action="{{url('attrvalue/attrvalueupdo')}}" method="post">
        <input type="hidden" name="attr_value_id" value="{{$data['attr_value_id']}}">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">属性值名称</label>

                <div class="col-sm-10">
                    <input type="text" name="attr_value_name" class="form-control" id="inputPassword3" value="{{$data['attr_value_name']}}" placeholder="属性值名称">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">属性</label>

                <div class="col-sm-10">
                    <select name="attr_id" id="" class="form-control">
                        @foreach($attribute as $k=>$v)
                            @if($v['attr_id'] == $data['attr_id'])
                                <option value="{{$v['attr_id']}}" selected>{{$v['attr_name']}}</option>
                            @endif
                            <option value="{{$v['attr_id']}}">{{$v['attr_name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="修改属性值"></input>
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
