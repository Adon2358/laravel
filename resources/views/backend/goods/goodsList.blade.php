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
            <td>分类</td>
            <td>品牌</td>
            <td>商品优惠</td>
            <td>商品价格</td>
            <td>商品描述</td>
            <td>商品图片</td>
            <td>添加时间</td>
            <td>商品状态</td>
            <td>操作</td>
        </tr>
        @foreach($data as $k=>$v)
            <tr>
                <td>{{$v['id']}}</td>
                <td>{{$v['sn']}}</td>
                <td>{{$v['name']}}</td>
                <td>{{$v['cat_name']}}</td>
                <td>{{$v['brand_name']}}</td>
                <td>{{$v['yh']}}</td>
                <td>{{$v['price']}}</td>
                <td>{{$v['desc']}}</td>
                <td><img src="{{URL::asset($v['img'])}}" alt="" width="30px" height="30px"></td>
                <td><?php echo date('Y-m-d H:i:s',$v['add_time']);?></td>
                <td>
                    <a href="javescript:void(0)" class="goodsStatus" id="{{$v['id']}}">{{$v['is_top_down']?"上架":"下架"}}</a>
                </td>
                <td>
                     <a href="javascript:void(0)" class="fa fa-fw fa-close del" id="{{$v['id']}}"></a>
                     <a href="goodsup/goods_id/{{$v['id']}}" class="fa fa-fw fa-edit"></a>
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
            var id = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "goodsdel",
                data: {id:id,'_token':'{{csrf_token()}}'},
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
            var id = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "goodsstatus",
                data: {id:id,'_token':'{{csrf_token()}}'},
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



