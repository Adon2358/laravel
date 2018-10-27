{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '属性值列表')

@section('content_header')
    <h1>属性值列表</h1>
@stop

@section('content')

    <table class="table table-hover">
        <tr>
            <td>属性值ID</td>
            <td>属性值名称</td>
            <td>属性</td>
            <td>操作</td>
        </tr>
        @foreach($data as $k=>$v)
            <tr>
                <td>{{$v['attr_value_id']}}</td>
                <td>{{$v['attr_value_name']}}</td>
                <td>{{$v['attr_name']}}</td>
                <td>
                     <a href="javascript:void(0)" class="fa fa-fw fa-close del" id="{{$v['attr_value_id']}}"></a>
                     <a href="attrvalueup/attr_value_id/{{$v['attr_value_id']}}" class="fa fa-fw fa-edit"></a>
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
            var attr_value_id = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "attrvaluedel",
                data: {attr_value_id:attr_value_id,'_token':'{{csrf_token()}}'},
                success: function(msg){
                    if(msg){
                        $("body").html(msg);
                    }else{
                        alert("删除失败");
                        location.href='attrvaluelist';
                    }
                }
            });
        });

    </script>
@stop



