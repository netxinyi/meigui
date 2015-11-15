@extends('layouts.layout')
@section('global-css')

    <link rel="stylesheet" href="/assets/lib/amazeui/amazeui.min.css"/>
    <link rel="stylesheet" href="/assets/css/lanren.css"/>
@stop

@section('header-global-js')

@stop

@section('footer-global-js')
    <script src="/assets/lib/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/assets/lib/amazeui/amazeui.min.js"></script>
    <script type="text/javascript">
        var path = location.pathname;
        $('.nav_list li').find('a[href="' + path + '"]').addClass("nav_list_active").parent("li").siblings().find("a").removeClass("nav_list_active");
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
