{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '添加角色')

@section('content_header')
    <h1>添加角色</h1>
@stop

@section('content')
    <form class="form-horizontal" action="{{url('role/roleadddo')}}" method="post">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">名字</label>

                <div class="col-sm-10">
                    <input type="text" name="r_name" class="form-control"  placeholder="名字">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">分配权限</label>

                <div class="col-sm-10">
                    @foreach($menu as $v)
                        <p>
                            @if($v['p_id'] == 0)
                            <b>
                                <input type="checkbox" name="m_id[]" value="{{$v['m_id']}}">&nbsp;{{$v['text']}}&nbsp;
                            </b>

                            @else
                            <span>
                                <input type="checkbox" name="m_id[]" value="{{$v['m_id']}}">&nbsp{{str_repeat('|--',substr_count($v['path'],'-'))}}{{$v['text']}}&nbsp;
                            </span>
                            @endif
                          </p>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="添加角色"></input>
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
