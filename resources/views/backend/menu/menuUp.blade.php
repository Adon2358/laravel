{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '修改菜单')

@section('content_header')
    <h1>修改菜单</h1>
@stop

@section('content')
    <form class="form-horizontal" action="{{url('menu/menuupdo')}}" method="post">
        <input type="hidden" name="m_id" value="{{$data->m_id}}">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">名称</label>

                <div class="col-sm-10">
                    <input type="text" name="text" class="form-control"  placeholder="名称" value="{{$data->text}}">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">地址</label>

                <div class="col-sm-10">
                    <input type="text" name="url" class="form-control"  placeholder="地址"  value="{{$data->url}}">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">上级元素</label>

                <div class="col-sm-10">
                    <select name="p_id" id="" class="form-control">
                        @foreach($res as $k=>$v)
                                <option value="{{$k}}">{{str_repeat('|-',substr_count($v['path'],'-'))}}{{$v['text']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">是否显示此菜单</label>

                <div class="col-sm-10">
                    @if($data->is_menu == 1)
                        <input type="radio" name="is_menu"   value="1" checked>是
                        <input type="radio" name="is_menu"   value="0">否
                     @else
                        <input type="radio" name="is_menu"   value="1">是
                        <input type="radio" name="is_menu"   value="0" checked>否
                    @endif
                </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="修改角色"></input>
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
