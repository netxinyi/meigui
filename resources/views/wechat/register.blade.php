<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>微信报名</title>
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
            微信报名
        </a>
    </h1>
</header>

<div>
    <form class="am-form" action="{{url('weixin/register')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="openid" value="{{$_GET['openid']}}"/>
        <fieldset>
            <div class="am-form-group">
                <label for="doc-ipt-email-1">真实姓名</label>
                <input type="text" name="user_name" class="" id="doc-ipt-email-1" placeholder="输入真实姓名">
            </div>

            <div class="am-form-group">
                <label for="doc-ipt-email-1">手机号</label>
                <input type="text" name="mobile" class="" id="doc-ipt-email-1" placeholder="输入手机号">
            </div>
            <font color="red"><?php echo $errors->first('mobile'); ?></font>

            <font color="red"><?php echo $errors->first('user_name'); ?></font>

            <div class="am-form-group">
                <label for="doc-select-1">性别</label>
                <select name="sex" id="doc-select-1">
                    <option value="2">女士</option>
                    <option value="1">男士</option>
                </select>
                <span class="am-form-caret"></span>
            </div>
            <font color="red"><?php echo $errors->first('sex'); ?></font>

            <div class="am-form-group">
                <label for="doc-ipt-email-1">生日</label>
                <input type="text" name="birthday" class="am-form-field" placeholder="选择日期" data-am-datepicker />
            </div>
            <font color="red"><?php echo $errors->first('birthday'); ?></font>

            <div class="am-form-group">
                <label for="doc-select-1">婚姻状况</label>
                <select name="marriage" id="doc-select-1">
                    <option value="1">未婚</option>
                    <option value="2">离婚</option>
                    <option value="3">丧偶</option>
                </select>
                <span class="am-form-caret"></span>
            </div>
            <font color="red"><?php echo $errors->first('marital_status'); ?></font>
            <p><button type="submit" class="am-btn am-btn-warning am-btn-block btn_color">马上报名</button></p>
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
