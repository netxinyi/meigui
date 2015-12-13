@extends('layouts.master')

@section('last-css')
    <link rel="stylesheet" href="/assets/css/index.css">
    @stop

    @section('body')

            <!-- 导航栏 -->
    <div class="wap_content1">
        <div class="content">
            <div class="c_left">
                <div class="baomingTit">
                    <h2>我要报名</h2>
                </div>
                <div class="baomingInner">
                    <form action="/auth/register" method="post" onsubmit="return false;" id="register-form">
                        {{csrf_field()}}
                        <div>
                            <span>真实姓名</span><input type="text" class="w_input" name="realname">
                        </div>
                        <div>
                            <span>手机号码</span><input type="text " class="w_input" name="mobile">
                        </div>
                        <div>
                            <span>性别</span>

                            <div class="radio_location">
                                <input type="radio" name="sex" id="sex_1" value="{{\App\Enum\User::SEX_MALE}}" checked>
                                <label for="sex_1">男</label>
                                <input type="radio" name="sex" value="{{\App\Enum\User::SEX_FEMALE}}">
                                <label for="sex_0">女</label><br>
                            </div>
                        </div>
                        <div>
                            <span>出生年月</span>
                            <input id="datepicker" type="text" name="birthday" class="w_input" placeholder="选择日期"/><br>
                        </div>
                        <div>
                            <span>婚姻状况</span>

                            <div class="radio_location">
                                <input type="radio" name="marriage" id="status_1"
                                       value="{{\App\Enum\User::MARRIAGE_UNMARRIED}}" checked="checked">
                                <label for="status_1">未婚</label>
                                <input type="radio" name="marriage" id="status_2"
                                       value="{{\App\Enum\User::MARRIAGE_DIVORCED}}">
                                <label for="status_2">离婚</label>
                                <input type="radio" name="marriage" id="status_3"
                                       value="{{\App\Enum\User::MARRIAGE_WIDOWED}}">
                                <label for="status_3">丧偶</label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="am-btn am-btn-danger am-btn-block">马上报名</button>
                        </div>
                    </form>

                </div>
                <div class="baomingtishi">
                    <div>
                        <span>报名说明：报名成功后，我司客户代表会第一时间与您取得联系，请确保信息的真实性。客户代表审核您的报名后，即可登录使用</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="c_modle">
            <div data-am-widget="slider" class="am-slider am-slider-b1" data-am-slider='{&quot;controlNav&quot;:false}'>
                <ul class="am-slides">
                    @if(option('lb_image1'))
                        <li>
                            <a href="{{option('lb_url1')}}" target="_blank">
                                <img src="/uploads/images/{{option('lb_image1')}}" width="670" height="335">
                            </a>

                        </li>
                    @endif
                    @if(option('lb_image2'))
                        <li>
                            <a href="{{option('lb_url2')}}" target="_blank">
                                <img src="/uploads/images/{{option('lb_image2')}}" width="670" height="335">
                            </a>

                        </li>
                    @endif
                    @if(option('lb_image3'))
                        <li>
                            <a href="{{option('lb_url3')}}" target="_blank">
                                <img src="/uploads/images/{{option('lb_image3')}}" width="670" height="335">
                            </a>

                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="c_right">
            <div class="c_right_1">
                <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                    <!--列表标题-->
                    <div class="am-list-news-hd am-cf">
                        <!--带更多链接-->
                        <h2>派对集结号</h2>
                        <a href="./bottom.html" class="">
                            <span class="am-list-news-more am-fr">更多 &raquo;</span>
                        </a>
                    </div>
                    <div class="am-list-news-bd">
                        <ul class="am-list">
                            <li class="am-g am-list-item-dated">
                                <a href="./bottom.html" class="am-list-item-hd ">八月北京千人相亲会报名中</a>
                                <span class="am-list-date">2013-09-18</span>
                            </li>
                            <li class="am-g am-list-item-dated">
                                <a href="./bottom.html" class="am-list-item-hd ">七月爱情季节报名要脱光啦</a>
                                <span class="am-list-date">2013-10-14</span>
                            </li>
                            <li class="am-g am-list-item-dated">
                                <a href="./bottom.html" class="am-list-item-hd ">六月浪漫每一天报名相亲会</a>
                                <span class="am-list-date">2013-11-18</span>
                            </li>
                            <li class="am-g am-list-item-dated">
                                <a href="./bottom.html" class="am-list-item-hd ">5月浪漫每一天报名相亲会</a>
                                <span class="am-list-date">2013-11-18</span>
                            </li>
                            <li class="am-g am-list-item-dated">
                                <a href="./bottom.html" class="am-list-item-hd ">4月浪漫每一天报名相亲会</a>
                                <span class="am-list-date">2013-11-18</span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="c_right_2">
                <div id="show_huodong">
                    <a href="./hd.html"><img src="/assets/images/huodong1.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>


    <!-- 切换男女 -->
    <div class="wap_content">
        <div class="content">
            <div class="qienannv">
                <button class="am-btn am-btn-success" data-change-sex="{{\App\Enum\User::SEX_FEMALE}}">
                    <i class="am-icon-user am-success am-text-color"></i>看女生
                </button>
                <button class="am-btn am-btn-success" data-change-sex="{{\App\Enum\User::SEX_MALE}}">
                    <i class="am-icon-user am-success am-text-color"></i>看男生
                </button>
            </div>
        </div>
    </div>
    <!-- 展示女用户 -->
    <div class="wap_content2">
        <div class="content">
            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-6 am-gallery-bordered"
                data-am-gallery="{  }" id="index-recommend">
                @foreach($users as $user)
                    @if($user->user)
                        <li data-sex="{{$user->user->sex}}">
                        <div class="am-gallery-item">
                            <a href="/member/{{$user->user_id}}" class="">
                                <img src="{{$user->user->avatar}}" alt="{{$user->user->user_name}}"/>

                                <h3 class="am-gallery-title">{{$user->user->user_name}}</h3>

                                <div class="am-gallery-desc">{{$user->user->birthday}}</div>
                            </a>
                        </div>
                    </li>
                    @endif
                @endforeach

            </ul>
        </div>
    </div>
@stop

@section('footer-last-js')
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script>


        $(function () {
            var now = new Date() - 0;
            $('[data-change-sex]').click(function () {
                var sex = $(this).data('change-sex');
                $('#index-recommend').find('li').hide().parent().find('li[data-sex="' + sex + '"]').show();
            });


            $('#register-form').success(function () {
                $.redirect(null, 2);
            }).form();
            $('[data-change-sex="{{\App\Enum\User::SEX_FEMALE}}"]').click();

            $('#datepicker').datepicker({
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
@if (session('status'))
    <script>
        alert("{{session('status')}}")
    </script>
@endif