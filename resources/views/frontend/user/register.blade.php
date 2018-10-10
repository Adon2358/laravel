<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>用户注册</title>
		<link rel="stylesheet" type="text/css" href="{{URL::asset('/css/login.css')}}">

	</head>
	<body>
		<form action="{{url('user/registerDo')}}" method="post">
			{{csrf_field()}}
		<div class="regist">
			<div class="regist_center">
				<div class="regist_top">
					<div class="left fl">会员注册</div>
					<div class="right fr"><a href="./index.html" target="_self">小米商城</a></div>
					<div class="clear"></div>
					<div class="xian center"></div>
				</div>
				<div class="regist_main center">
					<div class="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名:&nbsp;&nbsp;<input class="shurukuang" type="text" name="username" id="name"  value=""  placeholder="请输入邮箱或手机号"/><span class="n_info">请不要输入汉字</span></div>
					<div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="password" id="pwd" value="" placeholder="请输入你的密码"/><span class="p_info">请输入6位以上字符</span></div>
					
					<div class="username">确认密码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="repassword" id="repwd" value="" placeholder="请确认你的密码"/><span class="rp_info">两次密码要输入一致哦</span></div>
					<div class="username">
						<div class="left fl">验&nbsp;&nbsp;证&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="yanzhengma" type="text" name="verificode" placeholder="请输入验证码"/></div>

						@if($errors->has('captcha'))
							<div class="col-md-12">
								<p class="text-danger text-left"><strong>{{$errors->first('captcha')}}<></p>
							</div>
						@endif

						<div class="right fl"><img src="{{captcha_src()}}"  style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()"></div>

						<div class="clear"></div>
					</div>
				</div>
				<div class="regist_submit">
					<input class="submit" type="submit" value="立即注册" >
				</div>
				
			</div>
		</div>
		</form>
	</body>
</html>
<script src="/js/jquery-1.7.2.min.js"></script>
<script>
    $("#name").blur(function(){
	    var name = $(this).val();
        var regEmail = /^[A-Za-z0-9]+\@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
        var regTel = /^[\d]{11}$/;
        if (regEmail.test(name)) {
            $('.n_info').text('用户邮箱注册');
        } else if (regTel.test(name)) {
            $('.n_info').text('用户手机号码注册');
        } else {
            $('.n_info').text('验证失败');return false;
        }
    })
    $("#pwd").blur(function(){
        var pwd = $(this).val();
        var regPwd = /^[a-zA-Z\d_\.\/]{6,}$/;
        if (regPwd.test(pwd)) {
            $('.p_info').text('密码验证成功');return true;
        } else {
            $('.p_info').text('密码验证失败');return false;
        }
    })
    $("#repwd").blur(function(){
        var repwd = $(this).val();
        var pwd = $("#pwd").val();
        var regPwd = /^[a-zA-Z\d_\.\/]{6,}$/;
        if (regPwd.test(repwd) && repwd == pwd) {
            $('.rp_info').text('两次密码相同');return true;
        } else {
            $('.rp_info').text('两次密码要输入一致哦');return false;
        }
    })
</script>