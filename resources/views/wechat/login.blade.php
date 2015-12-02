<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>会员登录</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="alternate icon" type="image/png" href="{{'/assets/weixin/i/favicon.png'}}">
    <link rel="stylesheet" href="{{'/assets/weixin/css/amazeui.min.css'}}"/>
    <style>
        /*头部样式*/
        .am-header-default {
            background-color: #f15481;
        }

        /*背景颜色*/
        body {
            background-color: #fff;
        }

        /*按钮颜色*/
        .btn_color {
            background-color: #f15481;
        }
    </style>

</head>
<body>
<header data-am-widget="header" class="am-header am-header-default">
    <h1 class="am-header-title">
        <a href="#title-link" class="">
            会员登录
        </a>
    </h1>
</header>

<div>
    <form class="am-form" action="{{url('weixin/login')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <fieldset>

            <div class="am-form-group">
                <label for="doc-ipt-email-1">手机</label>
                <input type="text" name="mobile" class="" placeholder="输入手机">
            </div>
            <font color="red"><?php echo $errors->first('mobile'); ?></font>

            <div class="am-form-group">
                <label for="doc-ipt-email-1">密码</label>
                <input type="password" name="password" class="" placeholder="输入密码">
            </div>
            <font color="red"><?php echo $errors->first('password'); ?></font>
            <font color="red"><?php echo $errors->first('error'); ?></font>

            <p>
                <button type="submit" class="am-btn am-btn-warning am-btn-block btn_color">登录</button>
            </p>
            <a href="{{url('weixin/register')}}" class="am-btn am-btn-warning am-btn-block btn_color">没有账号?点我注册</a>
        </fieldset>
    </form>

</div>

<!--[if lt IE 9]>

<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="{{'/assets/weixin/js/amazeui.ie8polyfill.min.js'}}"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{'/assets/weixin/js/jquery.min.js'}}"></script>
<!--<![endif]-->
<script src="{{'/assets/weixin/js/amazeui.min.js'}}"></script>
</body>
</html>
