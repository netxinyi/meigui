@extends('layouts.master')
@section('last-css')
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/detail.css"/>
    <style>
        .am-slider-default .am-control-thumbs img{height: 50px;}
        .am-control-thumbs li {
          width: 100%/5; /* n 为轮播图数量 */
        }
        .am-slider-default .am-control-thumbs li{width: 20%}
    </style>
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
                                            <img src="/assets/images/default-photo-female.jpg" style="width:298px;height:300px;">
                                        @elseif($user->sex == \App\Enum\User::SEX_MALE)
                                            <img src="/assets/images/default-photo-male.jpg" style="width:298px;height:300px;">
                                        @endif
                                    </li>
                                @else
                                    @foreach($user->gallery as $photo)
                                        @if($photo->image_url)
                                            <li data-thumb="{{$photo->image_url}}" >
                                                <img src="{{$photo->image_url}}" style="width:298px;height:300px;" />
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="wap_vip_left_msg">
                        <div class="am-panel am-panel-warning">
                            <!-- 基本信息 -->
                            <header class="am-panel-hd">
                                <h3 class="am-panel-title">{{$user->user_name}}<span
                                            style="font-size:14px;margin-left:10px;color:#999">ID:{{$user->user_id}}</span>
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
                                        <td>籍贯：<span class="msg_font_color">{{$user->info->origin}}</span></td>
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
                    <div class="am-panel am-panel-warning">
                        <header class="am-panel-hd">
                            <h3 class="am-panel-title">择偶条件</h3>
                        </header>
                        <div class="am-panel-bd">
                            <table class="am-table">
                                <tr>
                                    <td>年龄：<span class="msg_font_color">{{$user->object->age_lang}}</span></td>
                                    <td>身高：<span class="msg_font_color">{{$user->object->height_lang}}</span></td>
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
                    <div class="am-panel am-panel-warning">
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
                <div class="jiaoyoutishi_svip">
                    <div class="am-panel am-panel-warning">
                        <header class="am-panel-hd">
                            <h3 class="am-panel-title">我要报名(已报名{{$user->likeMe->count()}}人)</h3>
                        </header>
                        <div class="am-panel-bd">
                            <form action="/auth/register" id="register-form" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="like" value="{{$user->user_id}}">
                                <table>
                                    <tr>
                                        <td>真实姓名:</td>
                                        <td><input type="text" name="realname" required></td>
                                    </tr>
                                    <tr>
                                        <td>手机号码:</td>
                                        <td><input type="text" name="mobile" required></td>
                                    </tr>
                                    <tr>
                                        <td>性别:</td>
                                        <td>
                                            <input type="radio" name="sex" id="male" value="{{\App\Enum\User::SEX_MALE}}" checked>
                                            <label for="male">男</label>
                                            <input type="radio" name="sex" id="female" value="{{\App\Enum\User::SEX_FEMALE}}">
                                            <label for="female">女</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>出生年月:</td>
                                        <td><input type="text" name="birthday" required></td>
                                    </tr>
                                    <tr>
                                        <td>婚姻状况:</td>
                                        <td>

                                            <input type="radio" name="marriage" id="status_1" checked value="{{\App\Enum\User::MARRIAGE_UNMARRIED}}">
                                            <label for="status_1">未婚</label>
                                            <input type="radio" name="marriage" id="status_2" value="{{\App\Enum\User::MARRIAGE_DIVORCED}}">
                                            <label for="status_2">离婚</label>
                                            <input type="radio" name="marriage" id="status_3" value="{{\App\Enum\User::MARRIAGE_WIDOWED}}">
                                            <label for="status_3">丧偶</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align:center">
                                            <button type="submit"
                                                    class="am-btn am-btn-danger dy_btn_color am-btn-block">马上报名
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span>报名说明：报名成功后，我司客户代表会第一时间与您取得联系，请确保信息的真实性。客户代表审核您的报名后，即可登录使用</span>
                                        </td>
                                    </tr>
                                </table>
                            </form>

                        </div>
                    </div>
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
                温馨提示：请拨打{{option('tel')}} 或者联系在线客服QQ：{{option('qq1')}}获取心仪对象的联系方式。
            </div>
        </div>
    </div>
@stop


@section('footer-last-js')

    <script type="text/javascript">
        $(function(){
            $('#register-form').success(function () {
                $.redirect(null, 2);
            }).form();

            var now = new Date();

            $('[name="birthday"]').datepicker({
                theme: "danger",
                format: "yyyy-mm-dd",
                viewMode: "years",
                onRender: function (date, viewMode) {
                    if (date >= now) {
                        return 'am-disabled';
                    }
                }
            });
        });
    </script>
@stop