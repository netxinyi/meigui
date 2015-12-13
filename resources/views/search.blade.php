@extends('layouts.master')

@section('last-css')
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/detail.css">
@stop

@section('body')
    <div class="wap_vip search_bg">
        <div class="wap_vip_m">
            <form action="/search" method="GET">
                <div class="search_menu">
                    <div class="menu_xuan">
                        我要找：
                        <select name="sex">
                            <option value="{{\App\Enum\User::SEX_FEMALE}}"
                                    @if(Request::get('sex',\App\Enum\User::SEX_FEMALE) == \App\Enum\User::SEX_FEMALE) selected @endif >
                                女朋友
                            </option>
                            <option value="{{\App\Enum\User::SEX_MALE}}"
                                    @if(Request::get('sex') == \App\Enum\User::SEX_MALE) selected @endif>男朋友
                            </option>
                        </select>
                    </div>
                    <div class="menu_xuan">
                        选择年龄：
                        <select name="age_start">
                            <option value="0">不限制</option>
                            @for($i=18;$i<=70;$i++)

                                <option value="{{$i}}"
                                        @if($i == Request::get('age_start')) selected @endif>{{$i}}</option>
                            @endfor
                        </select>
                        至
                        <select name="age_end">
                            <option value="0">不限制</option>
                            @for($i=18;$i<=70;$i++)
                                <option value="{{$i}}"
                                        @if($i == Request::get('age_end')) selected @endif>{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="menu_xuan">
                        来自：
                        <select name="work_province"> </select>
                        <select name="work_city"></select>
                    </div>
                    <div class="menu_xuan" id="menu_xuan_btn">
                        <button type="submit" class="am-btn am-btn-danger ">搜索</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- 搜索结果 -->
    <div class="wap_content_member">

        <div class="content_member">
            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2   am-avg-md-3 am-avg-lg-6 am-gallery-bordered"
                data-am-gallery="{  }">
                @foreach($users as $user)
                    <li>
                        <div class="am-gallery-item ">
                            <a href="/member/{{$user->user_id}}" class="">

                                <img src="{{$user->avatar}}" alt="{{$user->user_name}}"/>

                                <h3 class="am-gallery-title">{{$user->user_name}}
                                    @if($user->level == \App\Enum\User::LEVEL_3)
                                        <span class="svip_tu">SVIP</span>
                                    @endif

                                </h3>

                                <div class="am-gallery-desc">
                                    {{$user->age_lang}}
                                    @if($user->work_province)
                                        ,{{$user->work_province}}
                                    @endif
                                    @if($user->height)
                                        , {{$user->height_lang}}
                                    @endif
                                    @if($user->education)
                                        <br>
                                        {{$user->education_lang}}

                                    @endif
                                    @if($user->salary)
                                        ,{{$user->salary_lang}}
                                    @endif
                                </div>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
            <?php echo str_replace('pagination', 'am-pagination am-pagination-right', $users->render());?>
        </div>
    </div>

@stop

@section('footer-last-js')

    <script type="text/javascript" src="/assets/lib/pcas/pcas.js"></script>
    <script type="text/javascript">
        $(function () {
            new PCAS('work_province', 'work_city', "{{Request::get('word_province')}}", "{{Request::get('work_coty')}}", "不限制", 0);

        });
    </script>
@stop