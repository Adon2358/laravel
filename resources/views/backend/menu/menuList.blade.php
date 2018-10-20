{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '菜单列表')

@section('content_header')
    <h1>菜单列表</h1>
@stop

@section('content')

    <table class="table table-hover">
        <tr>
            <td>菜单ID</td>
            <td>菜单名称</td>
            <td>菜单url</td>
            <td>Parent_id</td>
            <td>是否显示该菜单</td>
            <td>Path</td>
            <td>操作</td>
        </tr>
        @foreach($data as $k=>$v)
            <tr>
                <td>{{$v['m_id']}}</td>
                <td>{{str_repeat('|-',substr_count($v['path'],'-'))}}{{$v['text']}}</td>
                <td>{{$v['url']}}</td>
                <td>{{$v['p_id']}}</td>
                <td>
                    @if($v['is_menu'] == 1)
                        是
                    @else
                        否
                    @endif
                </td>
                <td>{{$v['path']}}</td>
                <td>
                   <a href="javascript:void(0)" class="fa fa-fw fa-close del" id="{{$v['m_id']}}"></a>
                   <a href="menuup/m_id/{{$v['m_id']}}" class="fa fa-fw fa-edit"></a>
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
            var m_id = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "menudel",
                // data: "a_id="+a_id,
                data: {m_id:m_id,'_token':'{{csrf_token()}}'},
                success: function(msg){
                    if(msg){
                       $("body").html(msg);
                    }else{
                        alert("删除失败");
                        location.href='menulist';
                    }
                }
            });
        });

    </script>
@stop

