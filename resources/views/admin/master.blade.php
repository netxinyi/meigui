@extends('layouts.layout')
@section('global-css')

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="/assets/lib/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet"/>
    <link href="/assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="/assets/admin/css/animate.min.css" rel="stylesheet"/>
    <link href="/assets/admin/css/style.min.css" rel="stylesheet"/>
    <link href="/assets/admin/css/style-responsive.min.css" rel="stylesheet"/>
    <link href="/assets/admin/css/theme/default.css" rel="stylesheet" id="theme"/>
    <!-- ================== END BASE CSS STYLE ================== -->

@stop

@section('header-global-js')
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="/assets/lib/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->

@stop

@section('footer-global-js')
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="/assets/lib/jquery/jquery-1.9.1.min.js"></script>
    <script src="/assets/lib/jquery/jquery-migrate-1.1.0.min.js"></script>
    <script src="/assets/lib/jquery-ui/ui/minified/jquery-ui.min.js"></script>
    <script src="/assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/assets/admin/crossbrowserjs/html5shiv.js"></script>
    <script src="/assets/admin/crossbrowserjs/respond.min.js"></script>
    <script src="/assets/admin/crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/assets/lib/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/assets/lib/jquery-cookie/jquery.cookie.js"></script>
    <script src="/assets/admin/js/apps.min.js"></script>
    <!-- ================== END BASE JS ================== -->
    <script>
        $(document).ready(function () {
            App.init();
        });
    </script>
@stop

@section('head')
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->
@stop

@section('body')
    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        @include('admin.header')
        @include('admin.nav')
        <!-- begin #content -->
        <div id="content" class="content">
            @yield('content')
        </div>
        <!-- end #content -->
    </div>
@stop

@section('body-class')pace-top @stop

