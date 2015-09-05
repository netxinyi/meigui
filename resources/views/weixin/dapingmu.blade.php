<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta content="战狼技术团队" name="author"/>
    <title>
        微信大屏幕
    </title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" href="/assets/dapingmu/css/common.css">
    @if($style)
        <link rel="stylesheet" href="/assets/dapingmu/{{$style}}/css/common.css">
    @endif
</head>

<body class="{{$style}}">
<div id="wrap">

    <div class="full-warning">
        <i class="close">×</i>

        <div class="warn-content">
            <p>由于你正在使用非Chrome浏览器，大屏幕的体验处于不佳状态，建议您立刻更换浏览器，以获得更好的大屏幕产品用户体验</p>

            <p><span>安装Chrome浏览器：</span><a href="https://www.google.com/intl/zh-CN/chrome/browser/"
                                           target="_blank">chrome</a></p>
        </div>
    </div>
    <div id="content">
        <div id="header" class="clearfix">
            <div class="logo">
                <a href="http://wxscreen.com" target="_blank">

                    <img src="/assets/dapingmu/img/logo.png"/>

                </a>
            </div>
            <ul class="notice-list clearfix">
                <li class="active">微信大屏幕官方演示页面<br>点击下方对应功能按钮可查看功能演示</li>

                <li>微信号：netxinyi<br/>关注后发送内容即可上墙</li>


                <li>编辑短信内容#微信墙#+您想说的话 <br>到 1069-0133-0101-1350 即可上墙</li>

            </ul>
            <div class="qrcode">
                <img src="/assets/dapingmu/img/qrcode.jpg">

            </div>
        </div>
        <div id="container">
            <div id="message-wall">
                <ul class="message-list">

                </ul>
                <div class="content-detail">
                    <div class="detail-list">
                        <div class="content-detail-item">
                            <div class="detail-header">
                                <div class="user-avatar">
                                    <img src="http://wx.qlogo.cn/mmopen/ajNVdqHZLLC11iaTPfGbdHUicPBALG3IWicILXibyrkGQnyib6CvicxpSApR6m4WwYOwhNwicb8pI3KvCUAm9K6djum5A/0"
                                         width="90" height="90" alt="">
                                </div>
                                <div class="user-info">
                                    <span class="user-name">迁迁</span>
                                    <span>来自微信</span>
                                </div>
                            </div>
                            <div class="detail-content">
                                详细内容
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0);" class="close" style=""></a>
                </div>
            </div>

        </div>
        <div id="footer" class="clearfix">

            <div class="logo">
                <img src="http://demo.wxscreen.com/images/common/logo-b.png">
            </div>
            <!--logo结束-->

            <!--滚动公告-->
            <div class="notice">
                <div class="notice-wrap">
                    <ul class="notice-list clearfix">
                        <li>这里可以填写活动现场的公告之类的，比如找人，临时通知等等。</li>
                        <li>可以发多条公告的哦~~~~</li>
                        <li>这里可以填写活动现场的公告之类的，比如找人，临时通知等等。</li>
                        <li>可以发多条公告的哦~~~~</li>
                    </ul>

                </div>

            </div>
            <!--滚动公告结束-->

            <div class="contrl-list">
                <div class="prodres-box">

                </div>
                <ul>
                    <li class="ctn ctn-tag">加星消息</li>
                    <li class="ctn ctn-menu">

                    </li>
                    <li class="ctn ctn-style">风格选择</li>
                    <li class="ctn ctn-full">全屏</li>
                    <li class="ctn-player ctn-player-first">最旧</li>
                    <li class="ctn-player ctn-player-prev">上一条</li>
                    <li class="ctn-player ctn-player-play play">暂停</li>
                    <li class="ctn-player ctn-player-next">下一条</li>
                    <li class="ctn-player ctn-player-last">最新</li>
                </ul>
                <!--应用弹出层-->
                <div class="popup app-list">
                    <a class="app-icon app-icon-choujiang"></a>

                    <a class="app-icon app-icon-duiduipeng"></a>

                    <a class="app-icon app-icon-toupiao"></a>

                    <a class="app-icon app-icon-qiandao"></a>

                    <a class="app-icon app-icon-yaoyiyao"></a>

                    <a class="app-icon app-icon-hongbao"></a>

                    <a class="app-icon app-icon-danmu"></a>

                    <a class="app-icon app-icon-pingfen"></a>


                    <a class="app-icon app-icon-laohuji"></a>

                    <a class="app-icon app-icon-dashang"></a>

                    <a class="app-icon app-icon-dazhuanpan"></a>

                    <a class="app-icon app-icon-xuyuanshu"></a>

                </div>
                <!--应用弹出层结束-->
            </div>


        </div>
    </div>
</div>
<script type="text/javascript" src="/assets/lib/jquery/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/assets/lib/jquery-scroll-marquee/scroll-marquee.js"></script>
<script type="text/javascript" src="/assets/dapingmu/js/msgWall.js"></script>
<script type="text/javascript">
    var messages = {!! $messages ? : "[]" !!}
    MW.start({
        msgWall: {
            messages: messages,
            lastId:{{$last ?: 0}}
        }
    });
</script>
</body>
</html>


