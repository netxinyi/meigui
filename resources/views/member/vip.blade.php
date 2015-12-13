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
                                @if($user->gallery->isEmpty())
                                    <li>
                                        @if($user->sex == \App\Enum\User::SEX_FEMALE)
                                            <img src="/assets/images/default-photo-female.jpg">
                                        @elseif($user->sex == \App\Enum\User::SEX_MALE)
                                            <img src="/assets/images/default-photo-male.jpg">
                                        @endif
                                    </li>
                                @else
                                    @foreach($user->gallery as $photo)
                                        <li data-thumb="/uploads/avatar/{{$photo->image_url}}">
                                            <img src="/uploads/avatar/{{$photo->image_url}}"/>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="wap_vip_left_msg">
                        <div class="am-panel am-panel-default">
                            <!-- 基本信息 -->
                            <header class="am-panel-hd">
                                <h3 class="am-panel-title">{{$user->user_name}}<span
                                            style="font-size:14px;margin-left:10px;color:#999">{{$user->user_id}}</span>
                                </h3>
                            </header>
                            <div class="am-panel-bd">
                                <table class="am-table">
                                    <tr>
                                        <td>会员身份：<span class="msg_font_color">{{$user->level_lang}}</span></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">认证信息是会员自愿提供，目前中国无完整渠道确保100%真实，请理性对待。</td>
                                    </tr>
                                    <tr>
                                        <td>年龄：<span class="msg_font_color">{{$user->age_lang}}</span></td>
                                        <td>身高：<span class="msg_font_color">{{$user->height_lang}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>学历：<span class="msg_font_color">{{$user->education_lang}}</span></td>
                                        <td>婚姻状况：<span class="msg_font_color">{{$user->marriage_lang}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>住房：<span class="msg_font_color">{{$user->house_lang}}</span></td>
                                        <td>月薪：<span class="msg_font_color">{{$user->salary_lang}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>籍贯：<span class="msg_font_color">{{$user->info->origin_province}}</span></td>
                                        <td>民族：<span class="msg_font_color">{{$user->info->stock}}</span></td>
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
                                    <td>年龄：<span class="msg_font_color">{{$user->object->age_start}}
                                            岁 至 {{$user->object->age_end}}岁</span></td>
                                    <td>身高：<span class="msg_font_color">{{$user->object->height_start}}
                                            cm 至 {{$user->object->height_end}}cm</span></td>
                                </tr>
                                <tr>
                                    <td>学历：<span class="msg_font_color">{{$user->object->education_lang}}</span></td>
                                    <td>婚姻状况：<span class="msg_font_color">{{$user->object->marriage_lang}}</span></td>
                                </tr>
                                <tr>
                                    <td>居住情况：<span class="msg_font_color">{{$user->object->house_lang}}</span></td>
                                    <td>月薪：<span class="msg_font_color">{{$user->object->salary_lang}} </span></td>
                                </tr>
                                <tr>
                                    <td>籍贯：<span
                                                class="msg_font_color">{{$user->object->origin_province ?:"不限"}} </span>
                                    </td>
                                    <td>有无孩子：<span class="msg_font_color">{{$user->object->children_lang}}</span></td>
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
                                <span>{{$user->info->introduce}}</span>
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