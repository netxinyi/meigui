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
                    <form action="/auth/login" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <span>帐号</span><input type="text" placeholder="手机/邮箱" name="username">
                        <span>密码</span><input type="password" name="password" placeholder="请输入密码">
                        <button class="am-btn am-btn-warning" type="submit">登录</button>
                        <img src="/assets/images/wx_login.png" alt="用微信登录">

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
                <li><a href="/about">关于我们</a></li>
            </ul>
        </div>
        @if(isLogin())
            <div class="nav_user_msg">
                <ul>
                    <li><a href="/user/" class="right_xian">会员中心</a></li>
                    <li><a href="#" class="right_xian">{{user()->user_name}}</a></li>
                    <li><a href="/auth/logout">退出帐号</a></li>
                </ul>

            </div>
        @endif
    </div>
</div>