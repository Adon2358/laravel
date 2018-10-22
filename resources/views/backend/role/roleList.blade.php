{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '角色列表')

@section('content_header')
    <h1>角色列表</h1>
@stop

@section('content')

    <table class="table table-hover">
        <tr>
            <td>角色ID</td>
            <td>角色名称</td>
            <td>操作</td>
        </tr>
        @foreach($data as $k=>$v)
            <tr>
                <td>{{$v['r_id']}}</td>
                <td>{{$v['r_name']}}</td>
                <td>
                   <a href="javascript:void(0)" class="fa fa-fw fa-close del" id="{{$v['r_id']}}"></a>
                   <a href="roleup/r_id/{{$v['r_id']}}" class="fa fa-fw fa-edit"></a>
                </td>
            </tr>
        @endforeach
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>

        $(".del").click(function(){
            var r_id = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "roledel",
                // data: "a_id="+a_id,
                data: {r_id:r_id,'_token':'{{csrf_token()}}'},
                success: function(msg){
                    if(msg){
                       $("body").html(msg);
                    }else{
                        alert("删除失败");
                        location.href='rolelist';
                    }
                }
            });
        });

    </script>
@stop

