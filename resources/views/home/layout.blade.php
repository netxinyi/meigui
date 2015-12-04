@extends('layouts.master')

@section('last-css')
    <link rel="stylesheet" href="/assets/css/index.css">
@stop

@section('body')
    <div class="home_content">
        <div class="home_content_v">
            <!-- 左边部分 -->
            <div class="home_content_v_left">
                <div class="side-1">
                    <div class="side-1-img">
                        <a href="/home/avatar">
                            <img class="am-img-thumbnail am-circle" src="" width="140" height="140"/></a>
                    </div>
                </div>
                <div class="side-2" id="caidan">
                    <ul class="am-list am-list-border">
                        <li><a href="/home"><i class="am-icon-envelope"></i>基本信息</a></li>
                        <li><a href="/home/xiangxi/"> <i class="am-icon-tasks"></i>详细资料</a></li>
                        <li><a href="/home/jieshao"><i class="am-icon-comment-o"></i>自我介绍</a></li>
                        <li><a href="/home/zeou"><i class="am-icon-heart"></i>择偶条件</a></li>
                        <li><a href="/home/gallery"><i class="am-icon-photo"></i>我的相册</a></li>
                    </ul>
                </div>
            </div>
            <!-- 左边部分 end-->

            <!-- 右边部分 -->
            <div class="home_content_v_right">
                @yield('content')
            </div>
            <!-- 基本信息 end-->
        </div>
        <!-- 右边部分 end-->
    </div>
@stop

@section('footer-last-js')

@stop