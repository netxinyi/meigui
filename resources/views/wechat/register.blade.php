<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>注册会员</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="alternate icon" type="image/png" href="{{'/assets/wx/i/favicon.png'}}">
    <link rel="stylesheet" href="{{'/assets/wx/css/amazeui.min.css'}}"/>
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
            注册会员
        </a>
    </h1>
</header>

<div>
    <form class="am-form" action="{{url('weixin/register/checkregister')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <fieldset>

            <div class="am-form-group">
                <label for="doc-ipt-email-1">手机</label>
                <input type="text" name="mobile" class="" id="doc-ipt-email-1" placeholder="输入手机">
            </div>
            <font color="red"><?php echo $errors->first('mobile'); ?></font>

            <div class="am-form-group">
                <label for="doc-ipt-pwd-1">邮箱</label>
                <input type="text" name="email" class="" id="doc-ipt-pwd-1" placeholder="输入邮箱">
            </div>
            <font color="red"><?php echo $errors->first('email'); ?></font>

            <div class="am-form-group">
                <label for="doc-ipt-email-1">密码</label>
                <input type="password" name="password" class="" id="doc-ipt-email-1" placeholder="设置密码">
            </div>
            <div class="am-form-group">
                <label for="doc-ipt-email-1">确认密码</label>
                <input type="password" name="password_confirmation" class="" id="doc-ipt-email-1" placeholder="输入确认密码">
            </div>
            <font color="red"><?php echo $errors->first('password'); ?></font>

            <div class="am-form-group">
                <label for="doc-ipt-email-1">真实姓名</label>
                <input type="text" name="user_name" class="" id="doc-ipt-email-1" placeholder="输入真实姓名">
            </div>
            <font color="red"><?php echo $errors->first('user_name'); ?></font>

            <div class="am-form-group">
                <label for="doc-select-1">性别</label>
                <select name="sex" id="doc-select-1">
                    <option value="0">女士</option>
                    <option value="1">男士</option>
                </select>
                <span class="am-form-caret"></span>
            </div>
            <div class="am-form-group">
                <label for="doc-ipt-email-1">昵称</label>
                <input type="text" name="nick" class="" id="doc-ipt-email-1" placeholder="输入昵称">
            </div>
            <font color="red"><?php echo $errors->first('nick'); ?></font>

            <div class="am-form-group">
                <label for="doc-ipt-email-1">年龄</label>
                <input type="text" name="age" class="" id="doc-ipt-email-1" placeholder="输入年龄">
            </div>
            <font color="red"><?php echo $errors->first('age'); ?></font>

            <p>
                <button type="submit" class="am-btn am-btn-warning am-btn-block btn_color">提交注册</button>
            </p>
        </fieldset>
    </form>

</div>

<!--[if lt IE 9]>

<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="{{'/assets/wx/js/amazeui.ie8polyfill.min.js'}}"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{'/assets/wx/js/jquery.min.js'}}"></script>
<!--<![endif]-->
</body>
</html>