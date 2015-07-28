@extends('admin.master')

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="{{url('admin')}}">首页</a></li>
        <li><a href="javascript:;">网站设置</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">添加设置项
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
            <h4 class="panel-title">添加设置</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="{{url('admin/option')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="form-group">
                    <label class="col-md-2 control-label">标题</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="设置项标题" name="title"
                               value="{{old('title')}}"/>
                        @if($errors->has('title'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('title')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">编码</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="设置项编码" name="code"
                               value="{{old('code')}}"/>
                        @if($errors->has('title'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('title')}}</li>
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">默认值</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="默认值" name="value"
                               value="{{old('value')}}"/>
                        @if($errors->has('title'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('title')}}</li>
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">描述</label>

                    <div class="col-md-8">
                        <textarea class="form-control" placeholder="设置项描述" rows="5"
                                  name="desc">{{old('desc')}}</textarea>
                        @if($errors->has('desc'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('desc')}}</li>
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">录入方式</label>

                    <div class="col-md-8">
                        <select name="type" class="form-control">

                            @foreach(App\Enum\Option::$inputTypesForm as $value=>$lable)
                                <option value="{{$value}}" @if(old('type') == $value)
                                        selected @endif>{{$lable}}</option>

                            @endforeach
                        </select>
                        @if($errors->has('type'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('type')}}</li>
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">可选值</label>

                    <div class="col-md-8">
                        <textarea class="form-control" placeholder="可选值列表，一行一个" rows="5"
                                  name="values">{{old('values')}}</textarea>
                        @if($errors->has('values'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('values')}}</li>
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">自动加载</label>

                    <div class="col-md-8">
                        <label class="radio-inline">
                            <input type="radio" name="autoload" checked/>
                            是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="autoload"/>
                            否
                        </label>
                        @if($errors->has('autoload'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('autoload')}}</li>
                            </ul>
                        @endif
                    </div>
                </div>
                @if($errors->has('error'))
                    <ul class="parsley-errors-list filled">
                        <li class="parsley-required">{{$errors->first('error')}}</li>
                    </ul>
                @endif
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