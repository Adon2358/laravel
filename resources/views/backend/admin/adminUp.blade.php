{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '添加管理员')

@section('content_header')
    <h1>添加管理员</h1>
@stop

@section('content')
    <form class="form-horizontal" action="{{url('admin/adminupdo')}}" method="post">
        <input type="hidden" name="a_id" value="{{$data->a_id}}">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">邮箱</label>

                <div class="col-sm-10">
                    <input type="text" name="a_email" class="form-control" id="inputPassword3" placeholder="邮箱" value="{{$data->a_email}}">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">名字</label>

                <div class="col-sm-10">
                    <input type="text" name="a_name" class="form-control"  placeholder="名字" value="{{$data->a_name}}">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">分配角色</label>

                <div class="col-sm-10">
                    @foreach($roleAll as $k=>$v)
                        <input type="checkbox" name="r_id[]" value="{{$v['r_id']}}" @if(in_array($v['r_id'],$r_id)) checked @endif >&nbsp;{{$v['r_name']}}&nbsp;
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="修改管理员"></input>
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
