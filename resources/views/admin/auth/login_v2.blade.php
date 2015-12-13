@extends('layouts.layout')

@section('title')
    登录-后台管理中心-{{config('app.site_name')}}
@stop
@section('global-css')

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
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

@section('body')

    <div class="login-cover">
        <div class="login-cover-image">
            <img src="/assets/admin/img/login-bg/bg-1.jpg" data-id="login-cover-image" alt=""/>
        </div>
        <div class="login-cover-bg"></div>
    </div>
    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <span class="logo">

                    </span> {{config('app.site_name')}}
                    <small>后台管理系统</small>
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in"></i>
                </div>
            </div>
            <!-- end brand -->
            <div class="login-content">
                <form action="{{url('/admin/auth/login')}}" method="POST" class="margin-bottom-0">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group m-b-20">
                        <input type="text" class="form-control input-lg" placeholder="用户名" name="admin_name"
                               value="{{old('admin_name')}}" required/>
                    </div>
                    <div class="form-group m-b-20 has-error">
                        <input type="password" class="form-control input-lg" placeholder="密码" name="admin_pass"
                               value="" required/>
                    </div>
                    <div class="checkbox m-b-20">
                        <label>
                            <input type="checkbox" name="remember" value="1" @if(old('remember')) checked @endif/>
                            记住登录状态
                        </label>
                        @if($errors->has())
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first()}}</li>
                            </ul>
                        @endif
                    </div>

                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg">登录</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end login -->
    </div>
    <!-- end page container -->

@overwrite

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

@section('footer-last-js')
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/assets/admin/js/login-v2.demo.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <script>
        $(document).ready(function () {
            LoginV2.init();
        });
    </script>
@stop

@section('body-class')pace-top @stop