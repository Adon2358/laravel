{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '添加菜单')

@section('content_header')
    <h1>添加菜单</h1>
@stop

@section('content')
    <form class="form-horizontal" action="{{url('menu/menuadddo')}}" method="post">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">名字</label>

                <div class="col-sm-10">
                    <input type="text" name="text" class="form-control"  placeholder="名字" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">地址</label>

                <div class="col-sm-10">
                    <input type="text" name="url" class="form-control"  placeholder="地址">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">上级元素</label>

                <div class="col-sm-10">
                    <select name="p_id" id="" class="form-control">
                        @foreach($data as $k=>$v)
                        <option value="{{$k}}">{{str_repeat('|-',substr_count($v['path'],'-'))}}{{$v['text']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">是否显示此菜单</label>

                <div class="col-sm-10">
                    <input type="radio" name="is_menu"   value="1" >是
                    <input type="radio" name="is_menu"   value="0" checked>否
                </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="添加菜单"></input>
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
