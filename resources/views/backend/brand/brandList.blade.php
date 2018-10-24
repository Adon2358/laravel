{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '品牌列表')

@section('content_header')
    <h1>品牌列表</h1>
@stop

@section('content')

    <table class="table table-hover">
        <tr>
            <td>品牌ID</td>
            <td>品牌名称</td>
            <td>品牌LoGo</td>
            <td>操作</td>
        </tr>
        @foreach($data as $k=>$v)
            <tr>
                <td>{{$v['brand_id']}}</td>
                <td>{{$v['brand_name']}}</td>
                <td><img src="{{URL::asset($v['brand_logo'])}}" alt="" width="30px" height="30px"></td>
                <td>
                     <a href="javascript:void(0)" class="fa fa-fw fa-close del" id="{{$v['brand_id']}}"></a>
                     <a href="brandup/brand_id/{{$v['brand_id']}}" class="fa fa-fw fa-edit"></a>
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
            var brand_id = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "branddel",
                data: {brand_id:brand_id,'_token':'{{csrf_token()}}'},
                success: function(msg){
                    if(msg){
                        $("body").html(msg);
                    }else{
                        alert("删除失败");
                        location.href='brandlist';
                    }
                }
            });
        });

    </script>
@stop



