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
                        <option value="{{\App\Enum\User::SEX_FEMALE}}">女朋友</option>
                        <option value="{{\App\Enum\User::SEX_MALE}}">男朋友</option>
                    </select>
                </div>
                <div class="menu_xuan">
                    选择年龄：
                    <select name="age">
                        <option value="0">不限制</option>
                        @for($i=0;$i<=70;$i++)

                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    至
                    <select name="age">
                        <option value="0">不限制</option>
                        @for($i=0;$i<=70;$i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="menu_xuan">
                    来自：
                    <select name="work_province">
                        <option value="0">不限制</option>
                        <option>北京</option>
                        <option>上海</option>
                        <option>广州</option>
                        <option>深圳</option>
                        <option>重庆</option>
                        <option>天津</option>

                        <option>内蒙古</option>
                        <option>广东</option>
                        <option>江苏</option>
                        <option>浙江</option>
                        <option>四川</option>
                        <option>福建</option>
                        <option>山东</option>
                        <option>湖北</option>
                        <option>河北</option>
                        <option>山西</option>

                        <option>辽宁</option>
                        <option>吉林</option>
                        <option>黑龙江</option>
                        <option>安徽</option>
                        <option>江西</option>
                        <option>河南</option>
                        <option>湖南</option>
                        <option>广西</option>
                        <option>海南</option>
                        <option>贵州</option>
                        <option>云南</option>
                        <option>西藏</option>
                        <option>陕西</option>
                        <option>甘肃</option>
                        <option>青海</option>
                        <option>宁夏</option>
                        <option>新疆</option>

                        <option>香港</option>
                        <option>澳门</option>
                        <option>台湾</option>
                    </select>
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
                        <a href="/user/{{$user->user_id}}" class="">

                            <img src="{{$user->avatar}}" alt="{{$user->user_name}}"/>

                            <h3 class="am-gallery-title">{$user->user_name}} <span class="svip_tu">SVIP</span></h3>

                            <div class="am-gallery-desc">28岁，北京，177cm，本科，5000～10000元</div>
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
            <ul class="am-pagination am-pagination-right" id="fenye">
                <li class="am-disabled"><a href="#">&laquo;</a></li>
                <li class="am-active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>

@stop

@section('footer-last-js')

    <script>

    </script>
@stop