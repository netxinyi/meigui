@extends('admin.master')

@section('title')
    微信设置 - 后台管理中心
    @stop

    @section('content')

            <!-- begin panel -->
    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>

                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                            class="fa fa-minus"></i></a>
            </div>
            <h4 class="panel-title">微信设置</h4>
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
                    <label class="col-md-2 control-label">App ID</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="微信App ID" name="wechat_app_id"
                               value="{{option('wechat_app_id')}}"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">App Secret</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="微信 App Secret" name="wechat_app_secret"
                               value="{{option('wechat_app_secret')}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Token</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="微信Token" name="wechat_token"
                               value="{{option('wechat_token')}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Encoding Key</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="加密字符串,加密模式下需要" name="wechat_encode_key"
                               value="{{option('wechat_encode_key')}}"/>
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