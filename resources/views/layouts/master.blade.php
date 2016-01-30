@extends('layouts.layout')
@section('global-css')

    <link rel="stylesheet" href="/assets/lib/amazeui/amazeui.min.css"/>
    <link rel="stylesheet" href="/assets/css/base.css"/>
    <link rel="stylesheet" href="/assets/css/lanren.css"/>
    <meta name="viewport"  content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
@stop

@section('header-global-js')

@stop

@section('footer-global-js')
    <script src="/assets/lib/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/assets/lib/amazeui/amazeui.min.js"></script>
    <script src="/assets/js/common/common.js"></script>

    <script type="text/javascript">
        //导航条选中样式
        var path = location.pathname;
        $('.nav_list li').find('a[href="' + path + '"]').addClass("nav_list_active").parent("li").siblings().find("a").removeClass("nav_list_active");
        //登录表单
        $('#login-form').form().success(function () {
            $.redirect(null, 1000);
        });
        $(function () {
            var flag = 0;
            $('#rightArrow').on("click", function () {
                if (flag == 1) {
                    $("#floatDivBoxs").animate({right: '-175px'}, 300);
                    $(this).animate({right: '-5px'}, 300);
                    $(this).css('background-position', '-50px 0');
                    flag = 0;
                } else {
                    $("#floatDivBoxs").animate({right: '0'}, 300);
                    $(this).animate({right: '170px'}, 300);
                    $(this).css('background-position', '0px 0');
                    flag = 1;
                }
            });
        });
    </script>
@stop


@section('foot')
    @include('layouts.footer')
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
    </div>
@endsection




@section('head')
    @include('layouts.header')
@stop
