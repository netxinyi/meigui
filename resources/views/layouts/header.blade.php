<div id="head_id">
    <!-- 顶部 -->
    <div id="top"></div>
    <!-- 顶部 -->
    <div id="head">
        <div id="logo">
            <img src="/assets/images/logo.png" alt="">
        </div>
        <div id="guanggao">
            <img src="/assets/images/guanggao.png" alt="">
        </div>
        <div id="show_num">
            <!--  <div class="am-u-sm-3" id="nav_show_num">
               <div><span>报名注册：</span><span  class="show_num">123456789位</span></div>
               <div><span>成功牵手：</span><span  class="show_num">666688866位</span></div>
               <div><span>幸福结婚：</span><span  class="show_num">333333333位</span></div>
             </div> -->
        </div>
        @if(!isLogin())
            <div id="login_new">
                <div id="more_login">
                    <form action="/auth/login" method="post" id="login-form">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <span>帐号</span><input type="text" placeholder="请输入手机号" name="mobile">
                        <span>密码</span><input type="password" name="password" placeholder="请输入密码">
                        <button class="am-btn am-btn-warning" type="submit" data-loading-text="登录">登录</button>
                        <a href="/auth/socialite/weixinweb" title="用微信登录">
                            <img src="/assets/images/wx_login.png" alt="用微信登录">

                        </a>

                    </form>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- 导航栏 -->
<div id="nav">
    <div class="nav_content">
        <div class="nav_list">
            <ul>
                <li><a href="/">首页</a></li>
                <li><a href="/member">会员专区</a></li>
                <li><a href="/search">高级搜索</a></li>
                <li><a href="{{Config::get('url')}}/article/1">关于我们</a></li>
            </ul>
        </div>
        @if(isLogin())
            <div class="nav_user_msg">
                <ul>
                    <li><a href="/home/" class="right_xian">会员中心</a></li>
                    <li><a href="#" class="right_xian">{{user()->user_name}}</a></li>
                    <li><a href="/auth/logout">退出帐号</a></li>
                </ul>

            </div>
        @endif
    </div>
</div>