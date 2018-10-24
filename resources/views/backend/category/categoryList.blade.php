{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '分类列表')

@section('content_header')
    <h1>分类列表</h1>
@stop

@section('content')

    <table class="table table-hover">
        <tr>
            <td>分类ID</td>
            <td>分类名称</td>
            <td>上级分类</td>
            <td>Path</td>
            <td>操作</td>
        </tr>
        @foreach($data as $k=>$v)
            <tr>
                <td>{{$v['cat_id']}}</td>
                <td>{{str_repeat('|-',substr_count($v['path'],'-'))}}{{$v['cat_name']}}</td>
                <td>{{$v['p_id']}}</td>
                <td>{{$v['path']}}</td>
                <td>
                     <a href="javascript:void(0)" class="fa fa-fw fa-close del" id="{{$v['cat_id']}}"></a>
                     <a href="categoryup/cat_id/{{$v['cat_id']}}" class="fa fa-fw fa-edit"></a>
                </td>
            </tr>
        @endforeach
    </table>
    {{--{{$data->links()}}--}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

        $(".del").click(function(){
            var cat_id = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "categorydel",
                data: {cat_id:cat_id,'_token':'{{csrf_token()}}'},
                success: function(msg){
                    if(msg){
                        $("body").html(msg);
                    }else{
                        alert("删除失败");
                        location.href='categorylist';
                    }
                }
            });
        });

    </script>
@stop



