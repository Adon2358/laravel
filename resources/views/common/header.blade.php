<header>
    <div class="top center">
        <div class="left fl">
            <ul>
                <li><a href="http://www.mi.com/" target="_blank">小米商城</a></li>
                <li>|</li>
                <li><a href="">MIUI</a></li>
                <li>|</li>
                <li><a href="">米聊</a></li>
                <li>|</li>
                <li><a href="">游戏</a></li>
                <li>|</li>
                <li><a href="">多看阅读</a></li>
                <li>|</li>
                <li><a href="">云服务</a></li>
                <li>|</li>
                <li><a href="">金融</a></li>
                <li>|</li>
                <li><a href="">小米商城移动版</a></li>
                <li>|</li>
                <li><a href="">问题反馈</a></li>
                <li>|</li>
                <li><a href="">Select Region</a></li>
                <div class="clear"></div>
            </ul>
        </div>
        <div class="right fr">
            <div class="gouwuche fr"><a href="{{url('cart/cart')}}">购物车</a></div>
            <div class="fr">
                <ul>
                    @if(!session()->has('user'))
                        {{--session()->has('username');--}}
                    <li><a href="{{url('user/login')}}" target="_blank">登录</a></li>
                    <li>|</li>
                    @else
                        <li>欢迎<?php echo Session()->get('user')['username']; ?>登录</li>
                        <li><a href="{{url('user/loginOut')}}">退出</a></li>
                    @endif
                        <li><a href="{{url('user/register')}}" target="_blank" >注册</a></li>
                        <li>|</li>
                    <li><a href="{{url('user/selfInfo')}}">消息通知</a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</header>