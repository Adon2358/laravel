{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '添加按钮')

@section('content_header')
    <h1>添加按钮</h1>
@stop

@section('content')
    <form class="form-horizontal" action="{{url('button/buttonadddo')}}" method="post">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">按钮名称</label>

                <div class="col-sm-10">
                    <input type="text" name="b_name" class="form-control" id="inputEmail3" placeholder="按钮">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">按钮地址</label>

                <div class="col-sm-10">
                    <input type="text" name="b_url" class="form-control"  placeholder="按钮地址">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">菜单</label>

                <div class="col-sm-10">
                    <select name="m_id" id="" class="form-control">
                        @foreach($res as $k=>$v)
                            <option value="{{$v['m_id']}}">{{str_repeat('|-',substr_count($v['path'],'-'))}}{{$v['text']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="添加按钮"></input>
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
