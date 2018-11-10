{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '添加分类')

@section('content_header')
    <h1>添加分类</h1>
@stop

@section('content')
    <form class="form-horizontal" action="{{url('category/categoryadddo')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">分类名称</label>

                <div class="col-sm-10">
                    <input type="text" name="t_name" class="form-control" id="inputPassword3" placeholder="分类名称">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">上级分类</label>

                <div class="col-sm-10">
                    <select name="p_id" id="" class="form-control">
                        <option value="0">请选择</option>
                        @foreach($data as $k=>$v)
                            <option value="{{$v['t_id']}}">{{$v['t_name']}}</option>
                         @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">分类url</label>

                <div class="col-sm-10">
                    <input type="text" name="t_url" class="form-control" id="inputPassword3"  placeholder="分类url">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label">商品图片：</label>
                <div class="col-sm-10">
                    <input type="file" name="t_img" id="type_img" style="width:250px;height:150px;position:absolute;opacity:0;">
                    <img class="thumb" style="width:200px;height:150px;border-radius:25px;" src="" alt="">
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="添加分类"></input>
        </div>
        <!-- /.box-footer -->
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        // console.log('Hi!');
        $(function(){
            var TypeImg = $('input:file').attr('t_img');
            if (TypeImg) {
                $('.thumb').attr('src','/image'+TypeImg);
            } else {
                $('.thumb').attr('src','/image/file.png');
            }
            $("#type_img").change(function(){
                $(".thumb").attr("src",URL.createObjectURL($(this)[0].files[0]));
            });
        });
    </script>
@stop
