@extends('admin.master')

@section('title')
    网站设置 - 后台管理中心
@stop

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="{{url('admin')}}">首页</a></li>
        <li><a href="javascript:;">网站设置</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">基本设置
        <small></small>
    </h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>

                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                            class="fa fa-minus"></i></a>
            </div>
            <h4 class="panel-title">基本设置</h4>
        </div>
        <div class="panel-body">
            @if($errors->has('error'))
                <div class="alert alert-danger fade in m-b-15">
                    {{$errors->first('error')}}
                    <span class="close" data-dismiss="alert">×</span>
                </div>
            @endif
            @if($errors->has('success'))
                <div class="alert alert-success fade in m-b-15">
                    {{$errors->first('success')}}
                    <span class="close" data-dismiss="alert">×</span>
                </div>
            @endif
            <form class="form-horizontal" action="{{url('admin/option')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="form-group">
                    <label class="col-md-2 control-label">网站名称</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="设置网站的名称" name="site_name"
                               value="{{old('site_name',$options['site_name'])}}"/>
                        @if($errors->has('site_name'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('site_name')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">网站地址</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="设置网站的URL" name="site_url"
                               value="{{old('site_url',$options['site_url'])}}"/>
                        @if($errors->has('site_url'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('site_url')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">网站关键词</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="设置网站默认的关键词" name="site_keywords"
                               value="{{old('site_keywords',$options['site_keywords'])}}"/>
                        @if($errors->has('site_keywords'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('site_keywords')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">网站描述</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="设置网站默认描述" name="site_description"
                               value="{{old('site_description',$options['site_description'])}}"/>
                        @if($errors->has('site_description'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('site_description')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">ICP备案号</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="设置网站ICP备案号" name="site_icp"
                               value="{{old('site_icp',$options['site_icp'])}}"/>
                        @if($errors->has('site_icp'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('site_icp')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2"></label>

                    <div class="col-md-8">
                        <button type="submit" class="btn btn-sm btn-success pull-right">&nbsp;提&nbsp;交&nbsp;</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end panel -->


@stop

@section('footer-last-js')

@stop

@section('last-css')

@stop