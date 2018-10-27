{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '商品列表')

@section('content_header')
    <h1>商品列表</h1>
@stop

@section('content')

    <table class="table table-hover">
        <tr>
            <td>商品ID</td>
            <td>商品货号</td>
            <td>商品名称</td>
            <td>商品图片</td>
            <td>分类</td>
            <td>商品优惠</td>
            <td>商品价格</td>
            <td>商品描述</td>
            <td>是否新品</td>
            <td>商品状态</td>
            <td>操作</td>
        </tr>
        @foreach($data as $k=>$v)
            <tr>
                <td>{{$v['goods_id']}}</td>
                <td>{{$v['goods_sn']}}</td>
                <td>{{$v['goods_name']}}</td>
                <td><img src="{{URL::asset($v['goods_img'])}}" alt="" width="30px" height="30px"></td>
                <td>{{$v['t_name']}}</td>
                <td>{{$v['yh']}}</td>
                <td>{{$v['goods_price']}}</td>
                <td>{{$v['goods_desc']}}</td>
                <td>{{$v['is_new']?"新品":"否"}}</td>
                <td>
                    <a href="javescript:void(0)" class="goodsStatus" id="{{$v['goods_id']}}">{{$v['is_sale']?"上架":"下架"}}</a>
                </td>
                <td>
                     <a href="javascript:void(0)" class="fa fa-fw fa-close del" id="{{$v['goods_id']}}"></a>
                     <a href="goodsup/goods_id/{{$v['goods_id']}}" class="fa fa-fw fa-edit"></a>
                </td>
            </tr>
        @endforeach
    </table>
    {{$data->links()}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

        $(".del").click(function(){
            var goods_id = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "goodsdel",
                data: {goods_id:goods_id,'_token':'{{csrf_token()}}'},
                success: function(msg){
                    if(msg){
                        $("body").html(msg);
                    }else{
                        alert("删除失败");
                        location.href='goodslist';
                    }
                }
            });
        });

        $(".goodsStatus").click(function(){
            var goods_id = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "goodsstatus",
                data: {goods_id:goods_id,'_token':'{{csrf_token()}}'},
                success: function(msg){
                    if(msg){
                        $("body").html(msg);
                    }else{
                        alert("状态修改失败");
                        location.href='goodslist';
                    }
                }
            });
        })

    </script>
@stop



