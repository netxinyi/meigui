@extends('admin.master')

@section('title')
    编辑留言{{$model->title}} - 后台管理中心
@stop

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="{{url('admin')}}">首页</a></li>
        <li><a href="javascript:;">编辑留言</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">编辑留言
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
            <h4 class="panel-title">编辑留言-{{$model->title}}</h4>
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
            <form class="form-horizontal" action="{{route('admin.admins.update',['message_id'=>$model->message_id])}}"
                  method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put">


                <div class="form-group">
                    <label class="col-md-2 control-label">留言标题</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="5-100个字符" name="title"
                               value="{{old('title',$model->title)}}"/>
                        @if($errors->has('title'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('title')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">所属用户</label>

                    <div class="col-md-8">
                        <p class="form-control-static">{{$model->user->user_name}}</p>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">留言状态</label>

                    <div class="col-md-8">
                        <select name="status" class="form-control">
                            @foreach(App\Enum\GuestBook::$statusForm as $key=>$label)
                                <option value="{{$key}}" @if($key == $model->status)
                                        selected @endif>{{$label}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('status'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('status')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">留言内容</label>

                    <div class="col-md-8">
                        <textarea name="content" class="form-control">{{old('content',$model->content)}}</textarea>
                        @if($errors->has('content'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('content')}}</li>
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