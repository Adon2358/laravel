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
					<li>
						<a href="">手机</a>
						<a href="">电话卡</a>
						<div class="pop">
							<div class="left fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm6_80.png" alt=""></div>
											<span class="fl">小米6</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="./xiangqing.html" target="_blank">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/5c_80.png" alt=""></div>
											<span class="fl">小米手机5c</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xmNOTE2-80.jpg" alt=""></div>
											<span class="fl">小米Note 2</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米MIX</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米5s</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm5Splus.jpg" alt=""></div>
											<span class="fl">小米5s Plus</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>								
							</div>
							<div class="ctn fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm5-80.jpg" alt=""></div>
											<span class="fl">小米手机5</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hmn4x80.png" alt=""></div>
											<span class="fl">红米Note 4X</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hmnote4-80.jpg" alt=""></div>
											<span class="fl">红米Note-4</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4x_80.png" alt=""></div>
											<span class="fl">红米4x</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4-80.jpg" alt=""></div>
											<span class="fl">红米4</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4A-80.jpg" alt=""></div>
											<span class="fl">红米4A</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
							</div>
							<div class="right fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/compare.jpg" alt=""></div>
											<span class="fl">对比手机</span>
											<div class="clear"></div>
										</a>
									</div>
									<!-- <div class="xuangou_right fr"><a href="">选购</a></div> -->
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/mimobile.jpg" alt=""></div>
											<span class="fl">小米移动&nbsp;电话卡</span>
											<div class="clear"></div>
										</a>
									</div>
									<!-- <div class="xuangou_right fr"><a href="">选购</a></div> -->
									<div class="clear"></div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</li>
					<li>
						<a href="">笔记本</a>
						<a href="">平板</a>
						<div class="pop">
							<div class="left fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm6_80.png" alt=""></div>
											<span class="fl">小米6</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/5c_80.png" alt=""></div>
											<span class="fl">小米手机5c</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xmNOTE2-80.jpg" alt=""></div>
											<span class="fl">小米Note 2</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米MIX</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米5s</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm5Splus.jpg" alt=""></div>
											<span class="fl">小米5s Plus</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>								
							</div>
							<div class="ctn fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm5-80.jpg" alt=""></div>
											<span class="fl">小米手机5</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hmn4x80.png" alt=""></div>
											<span class="fl">红米Note 4X</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hmnote4-80.jpg" alt=""></div>
											<span class="fl">红米Note-4</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4x_80.png" alt=""></div>
											<span class="fl">红米4x</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4-80.jpg" alt=""></div>
											<span class="fl">红米4</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4A-80.jpg" alt=""></div>
											<span class="fl">红米4A</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
							</div>
							
							<div class="clear"></div>
						</div>
					</li>
					<li>
						<a href="">电视</a>
						<a href="">盒子</a>
						<div class="pop">
							<div class="left fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm6_80.png" alt=""></div>
											<span class="fl">小米6</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/5c_80.png" alt=""></div>
											<span class="fl">小米手机5c</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xmNOTE2-80.jpg" alt=""></div>
											<span class="fl">小米Note 2</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米MIX</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米5s</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm5Splus.jpg" alt=""></div>
											<span class="fl">小米5s Plus</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>								
							</div>
							<div class="ctn fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm5-80.jpg" alt=""></div>
											<span class="fl">小米手机5</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hmn4x80.png" alt=""></div>
											<span class="fl">红米Note 4X</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hmnote4-80.jpg" alt=""></div>
											<span class="fl">红米Note-4</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4x_80.png" alt=""></div>
											<span class="fl">红米4x</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4-80.jpg" alt=""></div>
											<span class="fl">红米4</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4A-80.jpg" alt=""></div>
											<span class="fl">红米4A</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
							</div>
							<div class="right fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/compare.jpg" alt=""></div>
											<span class="fl">对比手机</span>
											<div class="clear"></div>
										</a>
									</div>
									<!-- <div class="xuangou_right fr"><a href="">选购</a></div> -->
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/mimobile.jpg" alt=""></div>
											<span class="fl">小米移动&nbsp;电话卡</span>
											<div class="clear"></div>
										</a>
									</div>
									<!-- <div class="xuangou_right fr"><a href="">选购</a></div> -->
									<div class="clear"></div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</li>
					<li>
						<a href="">路由器</a>
						<a href="">智能硬件</a>
						<div class="pop">
							<div class="left fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm6_80.png" alt=""></div>
											<span class="fl">小米6</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/5c_80.png" alt=""></div>
											<span class="fl">小米手机5c</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xmNOTE2-80.jpg" alt=""></div>
											<span class="fl">小米Note 2</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米MIX</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米5s</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm5Splus.jpg" alt=""></div>
											<span class="fl">小米5s Plus</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>								
							</div>
							<div class="ctn fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm5-80.jpg" alt=""></div>
											<span class="fl">小米手机5</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hmn4x80.png" alt=""></div>
											<span class="fl">红米Note 4X</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hmnote4-80.jpg" alt=""></div>
											<span class="fl">红米Note-4</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4x_80.png" alt=""></div>
											<span class="fl">红米4x</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4-80.jpg" alt=""></div>
											<span class="fl">红米4</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4A-80.jpg" alt=""></div>
											<span class="fl">红米4A</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
							</div>
							<div class="right fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/compare.jpg" alt=""></div>
											<span class="fl">对比手机</span>
											<div class="clear"></div>
										</a>
									</div>
									<!-- <div class="xuangou_right fr"><a href="">选购</a></div> -->
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/mimobile.jpg" alt=""></div>
											<span class="fl">小米移动&nbsp;电话卡</span>
											<div class="clear"></div>
										</a>
									</div>
									<!-- <div class="xuangou_right fr"><a href="">选购</a></div> -->
									<div class="clear"></div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</li>
					<li>
						<a href="">移动电源</a>
						<a href="">电池</a>
						<a href="">插线板</a>
						<div class="pop">
							<div class="left fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm6_80.png" alt=""></div>
											<span class="fl">小米6</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/5c_80.png" alt=""></div>
											<span class="fl">小米手机5c</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xmNOTE2-80.jpg" alt=""></div>
											<span class="fl">小米Note 2</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米MIX</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米5s</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm5Splus.jpg" alt=""></div>
											<span class="fl">小米5s Plus</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>								
							</div>
							<div class="ctn fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm5-80.jpg" alt=""></div>
											<span class="fl">小米手机5</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hmn4x80.png" alt=""></div>
											<span class="fl">红米Note 4X</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hmnote4-80.jpg" alt=""></div>
											<span class="fl">红米Note-4</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4x_80.png" alt=""></div>
											<span class="fl">红米4x</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4-80.jpg" alt=""></div>
											<span class="fl">红米4</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4A-80.jpg" alt=""></div>
											<span class="fl">红米4A</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
							</div>
							<div class="right fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/compare.jpg" alt=""></div>
											<span class="fl">对比手机</span>
											<div class="clear"></div>
										</a>
									</div>
									<!-- <div class="xuangou_right fr"><a href="">选购</a></div> -->
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/mimobile.jpg" alt=""></div>
											<span class="fl">小米移动&nbsp;电话卡</span>
											<div class="clear"></div>
										</a>
									</div>
									<!-- <div class="xuangou_right fr"><a href="">选购</a></div> -->
									<div class="clear"></div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</li>
					<li>
						<a href="">耳机</a>
						<a href="">音箱</a>
						<div class="pop">
							<div class="left fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm6_80.png" alt=""></div>
											<span class="fl">小米6</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/5c_80.png" alt=""></div>
											<span class="fl">小米手机5c</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xmNOTE2-80.jpg" alt=""></div>
											<span class="fl">小米Note 2</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米MIX</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米5s</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm5Splus.jpg" alt=""></div>
											<span class="fl">小米5s Plus</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
							</div>
							<div class="ctn fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm5-80.jpg" alt=""></div>
											<span class="fl">小米手机5</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hmn4x80.png" alt=""></div>
											<span class="fl">红米Note 4X</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hmnote4-80.jpg" alt=""></div>
											<span class="fl">红米Note-4</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4x_80.png" alt=""></div>
											<span class="fl">红米4x</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4-80.jpg" alt=""></div>
											<span class="fl">红米4</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/hm4A-80.jpg" alt=""></div>
											<span class="fl">红米4A</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
							</div>
							<div class="right fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/compare.jpg" alt=""></div>
											<span class="fl">对比手机</span>
											<div class="clear"></div>
										</a>
									</div>
									<!-- <div class="xuangou_right fr"><a href="">选购</a></div> -->
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/mimobile.jpg" alt=""></div>
											<span class="fl">小米移动&nbsp;电话卡</span>
											<div class="clear"></div>
										</a>
									</div>
									<!-- <div class="xuangou_right fr"><a href="">选购</a></div> -->
									<div class="clear"></div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</li>
					<li>
						<a href="">保护套</a>
						<a href="">贴膜</a>
						<div class="pop">
							<div class="left fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm6_80.png" alt=""></div>
											<span class="fl">小米6</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/5c_80.png" alt=""></div>
											<span class="fl">小米手机5c</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xmNOTE2-80.jpg" alt=""></div>
											<span class="fl">小米Note 2</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米MIX</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米5s</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm5Splus.jpg" alt=""></div>
											<span class="fl">小米5s Plus</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>								
							</div>							
							<div class="clear"></div>
						</div>
					</li>
					<li>
						<a href="">线材</a>
						<a href="">支架</a>
						<a href="">储存卡</a>
						<div class="pop">
							<div class="left fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm6_80.png" alt=""></div>
											<span class="fl">小米6</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/5c_80.png" alt=""></div>
											<span class="fl">小米手机5c</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xmNOTE2-80.jpg" alt=""></div>
											<span class="fl">小米Note 2</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米MIX</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米5s</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm5Splus.jpg" alt=""></div>
											<span class="fl">小米5s Plus</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>			
							</div>
							<div class="clear"></div>
						</div>
					</li>
					<li>
						<a href="">箱包</a>
						<a href="">服饰</a>
						<a href="">鞋</a>
						<a href="">眼镜</a>
						<div class="pop">
							<div class="left fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm6_80.png" alt=""></div>
											<span class="fl">小米6</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/5c_80.png" alt=""></div>
											<span class="fl">小米手机5c</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xmNOTE2-80.jpg" alt=""></div>
											<span class="fl">小米Note 2</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米MIX</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米5s</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm5Splus.jpg" alt=""></div>
											<span class="fl">小米5s Plus</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>								
							</div>							
							<div class="clear"></div>
						</div>
					</li>
					<li>
						<a href="">米兔</a>
						<a href="">生活周边</a>
						<div class="pop">
							<div class="left fl">
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm6_80.png" alt=""></div>
											<span class="fl">小米6</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/5c_80.png" alt=""></div>
											<span class="fl">小米手机5c</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xmNOTE2-80.jpg" alt=""></div>
											<span class="fl">小米Note 2</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米MIX</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/MIX-80.jpg" alt=""></div>
											<span class="fl">小米5s</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>
								<div>
									<div class="xuangou_left fl">
										<a href="">
											<div class="img fl"><img src="./image/xm5Splus.jpg" alt=""></div>
											<span class="fl">小米5s Plus</span>
											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="">选购</a></div>
									<div class="clear"></div>
								</div>								
							</div>							
							<div class="clear"></div>
						</div>
					</li>
				</ul>
			</div>
		
		</div>	

		<div class="sub_banner center">
			<div class="sidebar fl">
				<div class="fl"><a href=""><img src="./image/hjh_01.gif"></a></div>
				<div class="fl"><a href=""><img src="./image/hjh_02.gif"></a></div>
				<div class="fl"><a href=""><img src="./image/hjh_03.gif"></a></div>
				<div class="fl"><a href=""><img src="./image/hjh_04.gif"></a></div>
				<div class="fl"><a href=""><img src="./image/hjh_05.gif"></a></div>
				<div class="fl"><a href=""><img src="./image/hjh_06.gif"></a></div>
				<div class="clear"></div>
			</div>
			<div class="datu fl"><a href=""><img src="./image/hongmi4x.png" alt=""></a></div>
			<div class="datu fl"><a href=""><img src="./image/xiaomi5.jpg" alt=""></a></div>
			<div class="datu fr"><a href=""><img src="./image/pinghengche.jpg" alt=""></a></div>
			<div class="clear"></div>


		</div>
	<!-- end banner -->
	<div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>

	<!-- start danpin -->
		<div class="danpin center">
			
			<div class="biaoti center">小米明星单品</div>
			<div class="main center">
				@foreach($shop as $k=>$va)
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="{{$va['img']}}" alt=""></a></div>
					<div class="pinpai"><a href="">{{$va['name']}}</a></div>
					<div class="youhui">{{$va['yh']}}</div>
					<div class="jiage">{{$va['price']}}元起</div>
				</div>
				@endforeach
		</div>
		<div class="peijian w">
			<div class="biaoti center">配件</div>
			<div class="main center">
				<div class="content">
					@foreach($shop1 as $k=>$val)
					<div class="remen fl">
						<div class="xinpin"><span>新品</span></div>
						<div class="tu"><a href=""><img src="{{$val['img']}}"></a></div>
						<div class="miaoshu"><a href="">{{$val['name']}}</a></div>
						<div class="jiage">{{$val['price']}}元</div>
						<div class="pingjia">{{$val['comment']}}人评价</div>
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