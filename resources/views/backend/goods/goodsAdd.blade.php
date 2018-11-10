{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', '添加商品')

@section('content_header')
    <h1>添加商品</h1>
@stop

@section('content')
    <form class="form-horizontal" action="{{url('goods/goodsadddo')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品名称</label>

                <div class="col-sm-10">
                    <input type="text" name="goods_name" class="form-control" id="inputPassword3" placeholder="商品名称">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品库存</label>

                <div class="col-sm-10">
                    <input type="number" name="goods_number" class="form-control" placeholder="商品库存">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品价格</label>

                <div class="col-sm-10">
                    <input type="text" name="goods_price" class="form-control" placeholder="商品价格">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">促销价格</label>

                <div class="col-sm-10">
                    <input type="text" name="promotion_price" class="form-control" placeholder="促销价格">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品优惠</label>

                <div class="col-sm-10">
                    <input type="text" name="yh" class="form-control" placeholder="商品优惠">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品描述</label>
                <div class="col-sm-10">
                    <div id="editor">
                        <p>请描述商品</p>
                    </div>
                    <textarea  name="goods_desc" id="text1" style="width:100%; height:200px;"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label">商品图片：</label>
                <div class="col-sm-10">
                    <input type="file" name="goods_img" id="type_img" style="width:250px;height:150px;position:absolute;opacity:0;">
                    <img class="thumb" style="width:200px;height:150px;border-radius:25px;" src="" alt="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">是否销售</label>

                <div class="col-sm-10">
                    <input type="radio" name="is_sale" value="1" checked>上架
                    <input type="radio" name="is_sale" value="0">下架
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">是否新品</label>

                <div class="col-sm-10">
                    <input type="radio" name="is_new" value="1" checked>是
                    <input type="radio" name="is_new" value="0">否
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">分类</label>

                <div class="col-sm-10">
                    <select name="t_id" id="" class="form-control cate">
                        <option value="">请选择分类</option>
                        @foreach($category as $k => $v)
                            <option value="{{$v['t_id']}}">{{$v['t_name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group-attr" hidden>
                <label for="inputEmail3" class="col-sm-2 control-label">属性</label>

                <div class="col-sm-10">
                   <div class="checkbox">
                       <ul id="checkbox">

                       </ul>

                   </div>
                </div>
            </div>
            <div class="form-group-attr_value" hidden>
                <label for="inputEmail3" class="col-sm-2 control-label">属性值</label>

                <div class="col-sm-10" id="attr_val_box">

                </div>
            </div>
            <div class="form-group sku_table" hidden>

                <div class="col-sm-10" id="attr_val_box">
                    <button type="button" style="width: 130px;margin-left: 40%;" class="btn btn-block btn-success sku">生成货品</button>
                </div>

            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <table class="table table-hover sku_table" hidden>
                        <thead>
                          <tr>
                              <td>sku名称</td>
                              <td>sku_str</td>
                              <td>sku_库存</td>
                              <td>sku价格</td>
                              <td>操作</td>
                          </tr>
                        </thead>
                        <tbody class="sku_list">

                        </tbody>
                    </table>
                </div>
            </div>
            {{--<div class="form-group">--}}
                {{--<label for="inputPassword3" class="col-sm-2 control-label">浏览量</label>--}}

                {{--<div class="col-sm-10">--}}
                    {{--<input type="number" name="views" class="form-control" placeholder="浏览量">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<label for="inputPassword3" class="col-sm-2 control-label">销量</label>--}}

                {{--<div class="col-sm-10">--}}
                    {{--<input type="number" name="sale_voume" class="form-control" placeholder="销量">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<label for="inputPassword3" class="col-sm-2 control-label">评论条数</label>--}}

                {{--<div class="col-sm-10">--}}
                    {{--<input type="number" name="comment_nunmber" class="form-control" placeholder="评论条数">--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="添加商品"></input>
        </div>
        <!-- /.box-footer -->
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script type="text/javascript" src="{{URL::asset('/js/wangEditor.min.js')}}"></script>
    <script>
        //富文本编辑器
        var E = window.wangEditor;
        var editor = new E('#editor');
        var $text1 = $('#text1')
        editor.customConfig.onchange = function (html) {
            // 监控变化，同步更新到 textarea
            $text1.val(html)
        }
        editor.create()
        // 初始化 textarea 的值
        $text1.val(editor.txt.html())


        $(function(){
            var TypeImg = $('input:file').attr('goods_img');
            if (TypeImg) {
                $('.thumb').attr('src','/image'+TypeImg);
            } else {
                $('.thumb').attr('src','/image/file.png');
            }
            $("#type_img").change(function(){
                $(".thumb").attr("src",URL.createObjectURL($(this)[0].files[0]));
            });
        });
        //选取分类时出现相对应属性
        $(".cate").change(function(){
            $("#checkbox").html('');
           var t_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "cateidgetattr",
                data: {t_id:t_id,'_token':'{{csrf_token()}}'},
                success: function(msg){
                    for (var i = 0;i < msg.length;i++) {
                        $(".form-group-attr").show();
                        $("#checkbox").append("<li><input type='checkbox' class='attr-checkbox' name='attr_id[]' id='"+ msg[i]['attr_name'] +"' value='"+ msg[i]['attr_id'] +"'><b>"+ msg[i]['attr_name'] +"</b></li>");
                    }
                    //根据所选属性显示对应属性值
                    $(".attr-checkbox").each(function(){
                        $(".sku_table").show();
                        $(this).change(function(){
                            var attr_id = $(this).val();
                            var attr_name = $(this).attr('id');
                            var bool = $(this).is(':checked');
                            if(!bool){
                                $(".AttrValue_"+attr_id).hide();
                                return
                            }
                            $.ajax({
                                type: "POST",
                                url: "attridgetattrvalue",
                                data: {attr_id:attr_id,'_token':'{{csrf_token()}}'},
                                success: function(msg){
                                    $(".form-group-attr_value").show();
                                    $("#attr_val_box").append("<div><p class='AttrValue_"+attr_id+"'><b>"+attr_name+"</b><input type='text' class='form-control addAttr_value_name ' name='attr_value_name' value='' placeholder='自定义属性值'></p></div>");
                                    for ( var start in msg) {
                                        $('#attr_val_box').append("<p  class='AttrValue_"+attr_id+"' style='display: inline-block'><span><input type='checkbox' class='attr-group' name='attr_value_id["+attr_id+"][]' id='' value='"+ msg[start]['attr_value_id'] +"'>"+msg[start].attr_value_name+"</span></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
                                    }
                                    //根据所自定义的进行入库
                                    $(".addAttr_value_name").blur(function(){

                                        var attr_value_name = $(this).val();
                                        $.ajax({
                                            type: "POST",
                                            url: "addattrvaluename",
                                            data: {attr_value_name:attr_value_name,attr_name:attr_name,attr_id:attr_id,'_token':'{{csrf_token()}}'},
                                            success: function(msg){
                                                if(msg == 1){
                                                    location.reload();
                                                } else {
                                                    alert('此属性已存在/自定义失败');
                                                    location.reload();
                                                }
                                            }
                                        });
                                    });
                                }
                            });
                        });
                    });
                }
            });

        });

        $(".sku").click(function(){
            $(".sku_table").show();
            var attr_value_id = [];
            $(".attr-group").each(function(){

                var bool = $(this).is(':checked');
                if(bool){
                    attr_value_id.push($(this).val());
                }
            });
            $.ajax({
                type: "POST",
                url: "attridgetsku",
                data: {attr_value_id:attr_value_id,'_token':'{{csrf_token()}}'},
                success: function(msg){
                    var sku_html = '';
                    for (var i in msg){
                        sku_html += "<tr id='"+i+"'><td><input type='hidden' name='sku_name["+i+"]' value='"+msg[i]['valstr']+"'>"+msg[i]['valstr']+"</td><td><input type='hidden' name='sku_str["+i+"]' value='"+msg[i]['idstr']+"'>"+msg[i]['idstr']+"</td><td><input type='text' name='sku_inventor["+i+"]' value='' placeholder='请填写库存'></td><td><input type='number' name='sku_price["+i+"]' value='' placeholder='请填写价格'></td><td><button type='button' class='btn btn-block btn-danger' onclick='deleteSku("+i+")'>删除</button></td></tr>";
                    }
                   $(".sku_list").html(sku_html);
                }
            })

        });

       function deleteSku(i)
       {
           $("#"+i+"").remove();
       }



    </script>
@stop
