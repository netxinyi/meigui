@extends('layouts.master')
@section('last-css')
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/detail.css"/>
@stop

@section('body')
    <div class="wap_vip">
        <div class="wap_vip_m">
            <!-- 左部分 -->
            <div class="wap_vip_left">
                <!-- 相片，基本信息 -->
                <div class="vip_lou1">
                    <div class="wap_vip_left_img">
                        <div class="am-slider am-slider-default"
                             data-am-flexslider="{controlNav: 'thumbnails', directionNav: false, slideshow: false}">
                            <ul class="am-slides">
                                <li data-thumb="./images/detail/001.jpg">
                                    <img src="./images/detail/001.jpg"/>
                                </li>
                                <li data-thumb="./images/detail/002.jpg">
                                    <img src="./images/detail/002.jpg"/>
                                </li>
                                <li data-thumb="./images/detail/003.jpg">
                                    <img src="./images/detail/003.jpg"/>
                                </li>
                                <li data-thumb="./images/detail/004.jpg">
                                    <img src="./images/detail/004.jpg"/>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="wap_vip_left_msg">
                        <div class="am-panel am-panel-default">
                            <!-- 基本信息 -->
                            <header class="am-panel-hd">
                                <h3 class="am-panel-title">{{$user->user_name}}<span style="font-size:14px;margin-left:10px;color:#999">{{$user->user_id}}</span>
                                </h3>
                            </header>
                            <div class="am-panel-bd">
                                <table class="am-table">
                                    <tr>
                                        <td>会员身份：<span class="msg_font_color">{{$user->level}}</span></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">认证信息是会员自愿提供，目前中国无完整渠道确保100%真实，请理性对待。</td>
                                    </tr>
                                    <tr>
                                        <td>年龄：<span class="msg_font_color">{{$user->age_format}}</span></td>
                                        <td>身高：<span class="msg_font_color">{{$user->height_format}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>学历：<span class="msg_font_color">{{$user->education_lang}}</span></td>
                                        <td>婚姻状况：<span class="msg_font_color">{{\App\Enum\User::$maritalForm[$user->marital_status]}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>住房：<span class="msg_font_color">独自租房</span></td>
                                        <td>月薪：<span class="msg_font_color">{{$user->salary_lang}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>籍贯：<span class="msg_font_color">{{$user->province}}</span></td>
                                        <td>民族：<span class="msg_font_color">汉族</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button type="button" class="am-btn am-btn-danger dy_btn_color"
                                                    data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 400, height: 225}">
                                                查看联系方式
                                            </button>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                            <!-- 基本信息 -->
                        </div>
                    </div>
                </div>
                <!-- 相片，基本信息 end-->
                <!-- 择偶条件 -->
                <div class="vip_lou2">
                    <div class="am-panel am-panel-default">
                        <header class="am-panel-hd">
                            <h3 class="am-panel-title">择偶条件</h3>
                        </header>
                        <div class="am-panel-bd">
                            <table class="am-table">
                                <tr>
                                    <td>年龄：<span class="msg_font_color">25岁</span></td>
                                    <td>身高：<span class="msg_font_color">173cm</span></td>
                                </tr>
                                <tr>
                                    <td>学历：<span class="msg_font_color">本科</span></td>
                                    <td>婚姻状况：<span class="msg_font_color">未婚</span></td>
                                </tr>
                                <tr>
                                    <td>居住情况：<span class="msg_font_color">已购房（无房贷）</span></td>
                                    <td>月薪：<span class="msg_font_color">5000～10000元</span></td>
                                </tr>
                                <tr>
                                    <td>籍贯：<span class="msg_font_color">北京</span></td>
                                    <td>有无孩子：<span class="msg_font_color">没有</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- 择偶条件 end-->
                <!-- 自我介绍 -->
                <div class="vip_lou3">
                    <div class="am-panel am-panel-default">
                        <header class="am-panel-hd">
                            <h3 class="am-panel-title">自我介绍</h3>
                        </header>
                        <div class="am-panel-bd">
                            <div class="ziwojieshao">
                  <span>分手一年多了，我依旧单着。生活中并不是没出现过其他男生，但都不是适合我的类型。爱情中我并不高傲，但真的宁愿单着，都不要选择不适合自己的人随便拍拖。
　　一个女孩子挺孤单的，身边的闺蜜都相继结婚拍拖，忙着没时间陪我了。以前读书时从没想过我会去参加相亲，到了这个年纪仍然找不到男朋友。引用一句话：生活就是这样，让幸福的人一直幸福，徘徊的人一直徘徊。又有人说：婚姻可以找，而爱情只可以等。而我，仍是那个在徘徊与等待的人。
　　我在佛山南海的一家银行上班，希望可以找个工作稳定的实在男生，最好是在佛山，一起踏踏实实的过日子。我给人的印象是斯文型，生活中较爱干净，喜欢旅行，游泳，偶尔一个人安静的阅读。希望在这里能遇到对的你。</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 自我介绍 end-->
            </div>
            <!-- 左部分 end-->
            <!-- 右边部分 -->
            <div class="wap_vip_right">
                <div class="jiaoyoutishi">
                    <img src="./images/yuehuiba.jpg" alt="">
                </div>
                <div class="jiaoyoutishi">
              <span>
                交友说明：<br/>
                1、挑选心仪的对象，联系客服协助您联系；<br/>
                2、请确保您的信息准确无误。<br/>
              </span>
                </div>
            </div>
            <!-- 右边部分 end-->
        </div>
    </div>



    <div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">查看联系方式
                <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
            </div>
            <div class="am-modal-bd">
                温馨提示：请拨打010-1234567 或者联系在线客服QQ：568888888获取心仪对象的联系方式。
            </div>
        </div>
    </div>

@stop