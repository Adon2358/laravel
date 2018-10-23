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

{{--1	管理员管理	admin	fa fa-share			0	1	1--}}
{{--2	管理员列表	admin/adminlist				1	1	1-2--}}
{{--3	添加管理员	admin/adminadd				1	1	1-3--}}
{{--4	删除管理员	admin/admindel				1	0	1-4--}}
{{--5	编辑管理员	admin/adminup				1	0	1-5--}}
{{--6	角色管理	role	fa fa-share			0	1	6--}}
{{--7	角色列表	role/rolelist				6	1	6-7--}}
{{--8	添加角色	role/roleadd				6	1	6-8--}}
{{--9	删除角色	role/roledel	fa fa-circle-o			6	0	6-9--}}
{{--10	编辑角色	role/roleup				6	0	6-10--}}
{{--11	菜单管理	menu	fa fa-share			0	1	11--}}
{{--12	菜单列表	menu/menulist				11	1	11-12--}}
{{--13	添加菜单	menu/menuadd				11	1	11-13--}}
{{--14	删除菜单	menu/menudel				11	0	11-14--}}
{{--15	编辑菜单	menu/menuup				11	0	11-15--}}
{{--16	按钮管理	button	fa fa-share			0	1	16--}}
{{--17	按钮列表	button/buttonlist				16	1	16-17--}}
{{--18	添加按钮	button/buttonadd				16	1	16-18--}}
{{--19	删除按钮	button/buttondel				16	0	16-20--}}
{{--20	编辑按钮	button/buttonup				16	0	16-21--}}
{{--21	个人中心	self	fa fa-circle-o			0	1	21--}}
{{--22	修改密码	self/setpwd				21	1	21-22--}}


