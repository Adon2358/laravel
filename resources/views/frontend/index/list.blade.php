<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>小米手机列表</title>
		<link rel="stylesheet" type="text/css" href="{{URL::asset('/css/style.css')}}">
	</head>
	<body>
	<!-- start header -->
	@include('common/header')
	<!--end header -->

<!-- start banner_x -->
		<div class="banner_x center">
			<a href="./index.html" target="_blank"><div class="logo fl"></div></a>
			<a href=""><div class="ad_top fl"></div></a>
			<div class="nav fl">
				<ul>
					<li><a href="">小米手机</a></li>
					<li><a href="">红米</a></li>
					<li><a href="">平板·笔记本</a></li>
					<li><a href="">电视</a></li>
					<li><a href="">盒子·影音</a></li>
					<li><a href="">路由器</a></li>
					<li><a href="">智能硬件</a></li>
					<li><a href="">服务</a></li>
					<li><a href="">社区</a></li>
				</ul>
			</div>
			<div class="search fr">
				<form action="" method="post">
					<div class="text fl">
						<input type="text" class="shuru"  placeholder="小米6&nbsp;小米MIX现货">
					</div>
					<div class="submit fl">
						<input type="submit" class="sousuo" value="搜索"/>
					</div>
					<div class="clear"></div>
				</form>
				<div class="clear"></div>
			</div>
		</div>
<!-- end banner_x -->

	<!-- start banner_y -->
	<!-- end banner -->

	<!-- start danpin -->
		<div class="danpin center">
			
			<div class="biaoti center">小米手机</div>
			<div class="main center">
				@foreach($goods as $k=>$v)
					<div class="mingxing fl mb20" style="border:2px solid #fff;width:230px;cursor:pointer;" onmouseout="this.style.border='2px solid #fff'" onmousemove="this.style.border='2px solid red'">
						<div class="sub_mingxing"><a href="{{url('index/details')}}/goods_id/{{$v['goods_id']}}" target="_blank"><img src="{{URL::asset($v['goods_img'])}}" alt=""></a></div>
						<div class="pinpai"><a href="{{url('index/details')}}/goods_id/{{$v['goods_id']}}" target="_blank">{{$v['goods_name']}}</a></div>
						<div class="youhui">{{$v['yh']}}</div>
						<div class="jiage">{{$v['goods_price']}}</div>
					</div>
				@endforeach
				<div class="clear"></div>
			</div>
			{{--<div class="main center mb20">--}}
				{{--<div class="mingxing fl mb20" style="border:2px solid #fff;width:230px;cursor:pointer;" onmouseout="this.style.border='2px solid #fff'" onmousemove="this.style.border='2px solid red'">--}}
					{{--<div class="sub_mingxing"><a href=""><img src="./image/liebiao_xiaomi5.jpg" alt=""></a></div>--}}
					{{--<div class="pinpai"><a href="">小米手机5</a></div>--}}
					{{--<div class="youhui">骁龙820处理器 / UFS 2.0 闪存</div>--}}
					{{--<div class="jiage">1799.00元</div>--}}
				{{--</div>--}}
				{{--<div class="clear"></div>--}}
			{{--</div>--}}
		</div>


	@include('common/footer')

	<!-- end danpin -->


	</body>
</html>