{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '修改角色')

@section('content_header')
    <h1>修改角色</h1>
@stop

@section('content')
    <form class="form-horizontal" action="{{url('role/roleupdo')}}" method="post">
        <input type="hidden" name="r_id" value="{{$data->r_id}}">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">名字</label>

                <div class="col-sm-10">
                    <input type="text" name="r_name" class="form-control"  placeholder="名字" value="{{$data->r_name}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">分配权限</label>

                <div class="col-sm-10">
                    @foreach($menuAll as $k=>$v)
                        {{--<input type="checkbox" name="m_id[]" value="{{$v['m_id']}}" @if(in_array($v['m_id'],$m_id)) checked @endif >&nbsp;{{$v['text']}}&nbsp;--}}
                        <p>
                            @if($v['p_id'] == 0)
                                <b>
                                    <input type="checkbox" name="m_id[]" onclick="parent({{$v['m_id']}})" id="parent{{$v['m_id']}}" value="{{$v['m_id']}}" @if(in_array($v['m_id'],$m_id)) checked @endif>&nbsp;{{$v['text']}}&nbsp;
                                </b>

                            @else
                                <span>
                                 <input type="checkbox" name="m_id[]" onchange="son({{$v['p_id']}})" class="son{{$v['p_id']}}" value="{{$v['m_id']}}" @if(in_array($v['m_id'],$m_id)) checked @endif>&nbsp{{str_repeat('|--',substr_count($v['path'],'-'))}}{{$v['text']}}&nbsp;
                               </span>
                            @endif
                        </p>

                    @endforeach
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

    <script>
        function parent(m_id)
        {
            var status = $("#parent"+m_id).is(":checked");
            $(".son"+m_id).prop("checked",status);
        }

        function son(m_id)
        {
            var status = $(".son"+m_id).is(":checked");
            $("#parent"+m_id).prop("checked",status);
        }
    </script>

@stop
