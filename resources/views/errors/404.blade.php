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
                <div class="error-message">We couldn't find it...</div>
                <div class="error-desc m-b-20">
                    The page you're looking for doesn't exist. <br/>
                    Perhaps, there pages will help find what you're looking for.
                </div>
                <div>
                    <a href="index.html" class="btn btn-success">Go Back to Home Page</a>
                </div>
            </div>
        </div>
        <!-- end error -->
    </div>
    <!-- end page container -->
@stop