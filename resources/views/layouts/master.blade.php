@extends('layouts.layout')
@section('global-css')

    <!-- Bootstrap Style -->
    <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="/css/common/main.css">
@stop

@section('header-global-js')
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/js/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
    <script type="text/javascript">
        window.onload = function () {
            document.getElementsByTagName('body')[0].innerHTML = '<div class="alert alert-danger">您的浏览器版本太低了，赶紧升级吧，亲！！！！</div>';
        }
    </script>
    <![endif]-->

@stop

@section('footer-global-js')
    <script src="/lib/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/lib/bootstrap/js/bootstrap.js" type="text/javascript "></script>
    <script src="/js/common/common.js" type="text/javascript "></script>
    <script src="/lib/sea/sea.js" type="text/javascript "></script>
    <script type="text/javascript">
        seajs.config({
            base: '/js',
            charset: 'utf-8'
        });
    </script>
@stop


@section('foot')
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
    </div>
@endsection




@section('head')
    @include('layouts.nav')
@stop