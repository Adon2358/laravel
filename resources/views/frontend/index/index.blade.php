<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>小米商城</title>
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
					@foreach($navigation as $k=>$v)
					<li><a href="{{$v['d_url']}}" target="_blank">{{$v['d_name']}}</a></li>
					@endforeach
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
		<div class="banner_y center">
			<div class="nav">
				<ul>
					@foreach($indexType as $key=>$valu)
					<li>
						<a href="">{{$valu['t_name']}}</a>
						<div class="pop">
							@foreach($valu['son'] as $ke=>$value)
							<div class="left fl" style="height: 80px">

								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="{{URL::asset($value['t_img'])}}" alt=""></div>
											<span class="fl">{{$value['t_name']}}</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>

							</div>
							@endforeach
							<div class="clear"></div>

						</div>
					</li>
					@endforeach
				</ul>
			</div>

		</div>

		<div class="sub_banner center">
			<div class="sidebar fl">
				<div class="fl"><a href=""><img src="{{URL::asset('/image/hjh_01.gif')}}"></a></div>
				<div class="fl"><a href=""><img src="{{URL::asset('/image/hjh_02.gif')}}"></a></div>
				<div class="fl"><a href=""><img src="{{URL::asset('/image/hjh_03.gif')}}"></a></div>
				<div class="fl"><a href=""><img src="{{URL::asset('/image/hjh_04.gif')}}"></a></div>
				<div class="fl"><a href=""><img src="{{URL::asset('/image/hjh_05.gif')}}"></a></div>
				<div class="fl"><a href=""><img src="{{URL::asset('/image/hjh_06.gif')}}"></a></div>
				<div class="clear"></div>
			</div>
			<div class="datu fl"><a href=""><img src="{{URL::asset('/image/hongmi4x.png')}}" alt=""></a></div>
			<div class="datu fl"><a href=""><img src="{{URL::asset('/image/xiaomi5.jpg')}}" alt=""></a></div>
			<div class="datu fr"><a href=""><img src="{{URL::asset('/image/pinghengche.jpg')}}" alt=""></a></div>
			<div class="clear"></div>


		</div>
	<!-- end banner -->
	<div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>

	<!-- start danpin -->
		<div class="danpin center">

			<div class="biaoti center">小米明星单品</div>
			<div class="main center">
				@foreach($singleGoods as $k=>$va)
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="{{URL::asset($va['goods_img'])}}" alt=""></a></div>
					<div class="pinpai"><a href="">{{$va['goods_name']}}</a></div>
					<div class="youhui">{{$va['yh']}}</div>
					<div class="jiage">{{$va['goods_price']}}元起</div>
				</div>
				@endforeach
		</div>
		<div class="peijian w">
			<div class="biaoti center">配件</div>
			<div class="main center">
				<div class="content">
					@foreach($partGoods as $k=>$val)
					<div class="remen fl">
						<div class="xinpin"><span>新品</span></div>
						<div class="tu"><a href=""><img src="{{URL::asset($val['goods_img'])}}"></a></div>
						<div class="miaoshu"><a href="">{{$val['goods_name']}}</a></div>
						<div class="jiage">{{$val['goods_price']}}元</div>
						<div class="pingjia">{{$val['comment_num']}}人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	@include('common/footer')
	</body>
</html>