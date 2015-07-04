@extends('admin.master')

@section('title')
    管理员列表 - 后台管理中心
@stop

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="{{url('admin')}}">首页</a></li>
        <li><a href="javascript:;">管理员列表</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">管理员列表
        <small></small>
    </h1>
    <!-- end page-header -->




@stop

@section('footer-last-js')

@stop

@section('last-css')

@stop