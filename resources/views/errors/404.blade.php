@extends('admin.master')

@section('title')
    没有找到改页面
@stop
@section('body')
    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin error -->
        <div class="error">
            <div class="error-code m-b-10">404 <i class="fa fa-warning"></i></div>
            <div class="error-content">
                <div class="error-message">抱歉！没有找到该网页</div>
                <div class="error-desc m-b-20">
                    您可以点击下面的按钮返回到网站首页 <br>
                    若您有任何问题，可联系我们
                </div>
                <div>
                    <a href="/" class="btn btn-success">返回到首页</a>
                </div>
            </div>
        </div>
        <!-- end error -->
    </div>
    <!-- end page container -->
@stop