@extends('layouts.master')
@section('last-css')
    <link rel="stylesheet" href="/assets/css/index.css">
    @stop
    @section('body')
            <!-- 男会员信息 -->
    <div class="wap_content_member" id="show_girl">
        <div class=" content_title">
            <div class="title_1">
                <span>男会员专区</span>
            </div>
            <div class="title_2">
                爱情等你来
            </div>
            <div class="more_url">
                <a href="/male_member">
                    <img src="/assets/images/more2.gif" alt="">
                </a>
            </div>
        </div>
        <div class="content_member">
            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2   am-avg-md-3 am-avg-lg-6 am-gallery-bordered"
                data-am-gallery="{  }">
                @foreach($user['male'] as $male)
                <li>

                    <div class="am-gallery-item">
                        <a href="/member/{{$male->user_id}}" class="">
                            <img src="{{$male->avatar}}" alt="{{$male->user_name}}"/>

                            <h3 class="am-gallery-title">{{$male->user_name}}</h3>

                            <div class="am-gallery-desc">{{$male->age_format}},{{$male->province}}
                                ,{{$male->height_format}},{{$male->education_lang}}<br/>
                                月收入 {{$male->salary_lang}}</div>
                        </a>
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
