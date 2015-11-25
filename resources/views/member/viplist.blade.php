@extends('layouts.master')
@section('last-css')
    <link rel="stylesheet" href="/assets/css/index.css">
@stop
@section('body')

    <!-- 高端会员信息 -->
    <div class="wap_content_member_top" id="show_girl">
        <div class=" content_title2">
            <div class="title_1_top">
                <span style="color:yellow">VIP才俊专区</span>
            </div>
            <div class="title_2">
                红娘一对一服务
            </div>
            <div class="more_url">
                <a href="/viplist_member"><img src="/assets/images/more2.gif" alt=""></a>
            </div>
        </div>
        <div class="content_member_top">
            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2   am-avg-md-3 am-avg-lg-5 am-gallery-bordered"
                data-am-gallery="{  }">
                @foreach($user['vip'] as $vip)
                <li>
                    <div class="am-gallery-item">
                        <a href="/member/{{$vip->user_id}}" class="">
                            <img src="{{$vip->avatar}}" alt="{{$vip->user_name}}"/>

                            <h3 class="am-gallery-title">{{$vip->user_name}}</h3>

                            <div class="am-gallery-desc">{{$vip->age_format}},{{$vip->province}}
                                ,{{$vip->height_format}},{{$vip->education_lang}}<br/>
                                月收入 {{$vip->salary_lang}}</div>
                        </a>

                        <div class="member_baoming">
                            <div class="member_baoming_num"><span>报名人数：{{$vip->count}}人</span></div>
                            <div class="member_baoming_btn">
                                <button class="am-btn am-btn-warning ">我要报名</button>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>




    <script>
        function see(num) {
            var num = num;
            if (num == 1) {
                $("#show_girl").hide();
                $("#show_boy").show();
            } else {
                $("#show_boy").hide();
                $("#show_girl").show();
            }

        }
    </script>
@stop
