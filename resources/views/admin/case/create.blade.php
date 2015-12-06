@extends('admin.master')

@section('title')
    添加案例 - 后台管理中心
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
            <h4 class="panel-title">添加案例</h4>
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
            <form class="form-horizontal" action="{{route('admin.case.store')}}" method="post" enctype ="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">


                <div class="form-group">
                    <label class="col-md-2 control-label">案例标题</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="请输入标题" name="title"
                               value="{{old('title')}}"/>
                        @if($errors->has('title'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('title')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">男主角</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="" name="male"
                               value="{{old('male_id')}}"/>
                        @if($errors->has('male_id'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('male_id')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">女主角</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="" name="female"
                               value="{{old('female_id')}}"/>
                        @if($errors->has('female_id'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('female_id')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">照片</label>

                    <div class="col-md-8">
                        <input type="file" class="form-control-static" placeholder="" name="photos"
                               value="{{old('photos')}}"/>
                        @if($errors->has('photos'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('photos')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">封面</label>

                    <div class="col-md-8">
                        <input type="file" class="form-control-static" placeholder="" name="cover"
                               value="{{old('cover')}}"/>
                        @if($errors->has('cover'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('cover')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>

                <div class="form-group">
                    <label for="title" style="margin-left: 5%">爱情故事</label>
                    <textarea name="content" id="html-editor" style="height: 300px"></textarea>
                    @if($errors->has('content'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{$errors->first('content')}}</li>
                        </ul>
                    @endif
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
    <script type="text/javascript" charset="utf-8" src="/assets/lib/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/assets/lib/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/assets/lib/umeditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript">
        //实例化编辑器
        var um = UM.getEditor('html-editor');
    </script>
@stop

@section('last-css')
    <link href="/assets/lib/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <style>
        .edui-container, .edui-body-container {
            width: 90% !important;
            margin-left: 5%;
        }
    </style>
@stop