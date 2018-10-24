{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '管理员列表')

@section('content_header')
    <h1>管理员列表</h1>
@stop

@section('content')

    <table class="table table-hover">
        <tr>
            <td>管理员ID</td>
            <td>管理员邮箱</td>
            <td>管理员名称</td>
            <td>管理员密码</td>
            <td>是否是管理员</td>
            <td>最后一次登录时间</td>
            <td>是否冻结</td>
            <td>操作</td>
        </tr>
        @foreach($data as $k=>$v)
            <tr>
                <td>{{$v['a_id']}}</td>
                <td>{{$v['a_email']}}</td>
                <td>{{$v['a_name']}}</td>
                <td>{{$v['a_pwd']}}</td>
                <td>{{$v['a_is_admin']?"是":"否"}}</td>
                <td><?php echo date('Y-m-d H:i:s',$v['a_last_time']);?></td>
                <td>
                    @if($v['a_is_admin'] == 0)
                        {{$v['a_is_valid']?"冻结":"解冻"}}
                    @endif

                </td>
                <td>
                    @if($v['a_is_admin'] == 0)
                        @if($button)
                            @foreach($button as $key=>$value)
                                @foreach($value as $ke=>$valu)
                                    @if($valu['b_name'] == "删除管理员")
                                        <a href="javascript:void(0)" class="fa fa-fw fa-close del" id="{{$v['a_id']}}"></a>
                                    @endif
                                    @if($valu['b_name'] == "编辑管理员")
                                        <a href="adminup/a_id/{{$v['a_id']}}" class="fa fa-fw fa-edit"></a>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif

                    @endif

                    @if($v['a_is_admin'] == 0)
                        @if($v['a_is_valid'] == 1)
                            <a href="javascript:void(0)"  class="fa fa-fw fa-toggle-on adminvalid" id="{{$v['a_id']}}"></a>
                        @else
                            <a href="javascript:void(0)" class="fa fa-fw fa-toggle-off adminvalid" id="{{$v['a_id']}}"></a>
                        @endif
                    @endif

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
    <script> console.log('Hi!'); </script>
    <script>

        $(".del").click(function(){
            var a_id = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "admindel",
                // data: "a_id="+a_id,
                data: {a_id:a_id,'_token':'{{csrf_token()}}'},
                success: function(msg){
                    if(msg){
                        $("body").html(msg);
                    }else{
                        alert("删除失败");
                        location.href='adminlist';
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


