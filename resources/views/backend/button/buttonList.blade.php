{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '按钮列表')

@section('content_header')
    <h1>按钮列表</h1>
@stop

@section('content')

    <table class="table table-hover">
        <tr>
            <td>按钮ID</td>
            <td>按钮名称</td>
            <td>按钮地址</td>
            <td>菜单</td>
            <td>操作</td>
        </tr>
        @foreach($data as $k=>$v)
            <tr>
                <td>{{$v->b_id}}</td>
                <td>{{$v->b_name}}</td>
                <td>{{$v->b_url}}</td>
                <td>{{$v->m_id}}</td>
                <td>
                    <a href="javascript:void(0)" class="fa fa-fw fa-close del" id="{{$v->b_id}}"></a>
                    <a href="buttonup/b_id/{{$v->b_id}}" class="fa fa-fw fa-edit"></a>
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
            var b_id = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "buttondel",
                // data: "a_id="+a_id,
                data: {b_id:b_id,'_token':'{{csrf_token()}}'},
                success: function(msg){
                    if(msg){
                        $("body").html(msg);
                    }else{
                        alert("删除失败");
                        location.href='buttonlist';
                    }
                }
            });
        });

        $(".adminvalid").click(function(){
            var a_id = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "adminvalid",
                // data: "a_id="+a_id,
                data: {a_id:a_id,'_token':'{{csrf_token()}}'},
                success: function(msg){
                    if(msg){
                        // location.reload();
                        $("body").html(msg);
                    }else{
                        alert("冻结/解冻失败");
                        location.href='adminlist';
                    }
                }
            });
        })


    </script>
@stop

