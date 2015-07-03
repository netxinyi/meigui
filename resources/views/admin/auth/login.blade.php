@extends('admin.master')

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
                    <div class="form-group m-b-20">
                        <input type="text" class="form-control input-lg" placeholder="用户名"/>
                    </div>
                    <div class="form-group m-b-20">
                        <input type="text" class="form-control input-lg" placeholder="密码"/>
                    </div>
                    <div class="checkbox m-b-20">
                        <label>
                            <input type="checkbox"/> 记住登录状态
                        </label>
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

@stop

@section('footer-last-js')
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/assets/admin/js/login-v2.demo.min.js"></script>
    <script src="/assets/admin/js/apps.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <script>
        $(document).ready(function () {
            App.init();
            LoginV2.init();
        });
    </script>
@stop