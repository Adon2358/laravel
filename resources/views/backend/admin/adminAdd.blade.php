{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '添加管理员')

@section('content_header')
    <h1>添加管理员</h1>
@stop

@section('content')
    <form class="form-horizontal" action="{{url('admin/adminadddo')}}" method="post">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">邮箱</label>

                <div class="col-sm-10">
                    <input type="email" name="a_email" class="form-control" id="inputEmail3" placeholder="邮箱">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">密码</label>

                <div class="col-sm-10">
                    <input type="password" name="a_pwd" class="form-control" id="inputPassword3" placeholder="密码">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">名字</label>

                <div class="col-sm-10">
                    <input type="text" name="a_name" class="form-control"  placeholder="名字">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">是否超级管理员</label>

                <div class="col-sm-10">
                    <input type="radio" name="a_is_admin" value="1"> 是
                    <input type="radio" name="a_is_admin" value="0" checked>否
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">分配角色</label>

                <div class="col-sm-10">
                    @foreach($role as $k=>$v)
                     <input type="checkbox" name="r_id[]" value="{{$v['r_id']}}">&nbsp;{{$v['r_name']}}&nbsp;
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="添加管理员"></input>
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
