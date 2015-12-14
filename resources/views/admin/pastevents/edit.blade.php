@extends('admin.master')

@section('title')
    编辑信息 - {{$model->title}}
@stop

@section('content')
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>

                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                            class="fa fa-minus"></i></a>
            </div>
            <h4 class="panel-title">编辑文章 - {{$model->title}}</h4>
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
                <form action="{{route('admin.pastevents.update',['pastevents_id'=>$model->pastevents_id])}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put">

                <div class="form-group">
                    <label for="title">文章标题</label>
                    <input type="text" class="form-control" id="title" placeholder="文章标题" name="title"
                           value="{{old('title',$model->title)}}">
                    @if($errors->has('title'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{$errors->first('title')}}</li>
                        </ul>
                    @endif
                </div>

                    <div class="form-group">
                        <label for="title">活动描述</label>
                        <textarea name="description" id="" class="form-control" rows="3" >{{old('description',$model->description)}}</textarea>
                        @if($errors->has('description'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('description')}}</li>
                            </ul>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="title">文章内容</label>
                        <textarea name="content" id="html-editor"
                                  style="height: 300px">{{old('content',$model->content)}}</textarea>
                        @if($errors->has('content'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('content')}}</li>
                            </ul>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-sm btn-primary m-r-5 pull-right">
                            &nbsp;发&nbsp;表&nbsp;</button>
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
            width: 100% !important;
        }
    </style>
@stop