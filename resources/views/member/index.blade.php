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
                @foreach($users['male'] as $user)
                    <li>

                        <div class="am-gallery-item">
                            <a href="/member/{{$user->user_id}}" class="">
                                <img src="{{$user->avatar}}" alt="{{$user->user_name}}"/>

                                <h3 class="am-gallery-title">{{$user->user_name}}</h3>

                                <div class="am-gallery-desc">
                                    {{$user->age_lang}}
                                    @if($user->work_city)
                                        ,{{$user->work_city}}
                                    @endif
                                    @if($user->height_lang)
                                        ,{{$user->height_lang}}
                                    @endif
                                    @if($user->education_lang)
                                        ,{{$user->education_lang}}
                                    @endif
                                    @if($user->salary_lang)
                                        <br/>
                                        月收入 {{$user->salary_lang}}
                                    @endif
                                </div>
                            </a>
                        </div>
                    </li>
                @endforeach


            </ul>
        </div>
    </div>

    <!-- 女会员信息 -->
    <div class="wap_content_member" id="show_girl">
        <div class=" content_title">
            <div class="title_1">
                <span>女会员专区</span>
            </div>
            <div class="title_2">
                爱情等你来
            </div>
            <div class="more_url">
                <a href="/female_member"> <img src="/assets/images/more2.gif" alt=""></a>
            </div>
        </div>
        <div class="content_member">
            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2   am-avg-md-3 am-avg-lg-6 am-gallery-bordered"
                data-am-gallery="{  }">
                @foreach($users['female'] as $user)
                    <li>

                        <div class="am-gallery-item">
                            <a href="/member/{{$user->user_id}}" class="">
                                <img src="{{$user->avatar}}" alt="{{$user->user_name}}"/>

                                <h3 class="am-gallery-title">{{$user->user_name}}</h3>

                                <div class="am-gallery-desc">
                                    {{$user->age_lang}}
                                    @if($user->work_city)
                                        ,{{$user->work_city}}
                                    @endif
                                    @if($user->height_lang)
                                        ,{{$user->height_lang}}
                                    @endif
                                    @if($user->education_lang)
                                        ,{{$user->education_lang}}
                                    @endif
                                    @if($user->salary_lang)
                                        <br/>
                                        月收入 {{$user->salary_lang}}
                                    @endif
                                </div>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


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
                @foreach($users['vip'] as $user)
                    <li>

                        <div class="am-gallery-item">
                            <a href="/member/{{$user->user_id}}" class="">
                                <img src="{{$user->avatar}}" alt="{{$user->user_name}}"/>

                                <h3 class="am-gallery-title">{{$user->user_name}}</h3>

                                <div class="am-gallery-desc">
                                    {{$user->age_lang}}
                                    @if($user->work_city)
                                        ,{{$user->work_city}}
                                    @endif
                                    @if($user->height_lang)
                                        ,{{$user->height_lang}}
                                    @endif
                                    @if($user->education_lang)
                                        ,{{$user->education_lang}}
                                    @endif
                                    @if($user->salary_lang)
                                        <br/>
                                        月收入 {{$user->salary_lang}}
                                    @endif
                                </div>
                            </a>

                            <div class="member_baoming">
                                <div class="member_baoming_num"><span>报名人数：{{$user->likeMe->count()}}</span></div>
                                <div class="member_baoming_btn">
                                    <a href="/member/{{$user->user_id}}" class="">
                                    <button class="am-btn am-btn-warning ">我要报名</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


    <!--鸳鸯谱  -->
    <div class="wap_content_member_yuanyang" id="show_girl">
        <div class=" content_title3">
            <div class="title_1_yuanyang">
                <span>鸳鸯谱</span>
            </div>
            <div class="title_2_yuanyang">
                爱情如此美妙
            </div>
            <div class="more_url_yuanyang"><a href="/jjlist">
                    <button class="am-btn am-btn-secondary am-btn-xs" id="title_btn">我要结婚啦</button>
                </a>
                <a href="/yylist"><img src="/assets/images/more2.gif" alt=""></a>
            </div>
        </div>
        <div class="content_member_yuanyang">
            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2   am-avg-md-3 am-avg-lg-6 am-gallery-bordered"
                data-am-gallery="{  }">
                @foreach($case as $case)
                <li>
                    <div class="am-gallery-item">
                        <a href="/scase/yydetail/{{$case->case_id}}" class="">
                            <img src="{{$case->cover}}" alt="{{$case->title}}"/>
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
@if (session('status'))
    <script>
        alert("{{session('status')}}")
    </script>
@endif
