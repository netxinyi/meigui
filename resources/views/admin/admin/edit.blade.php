@extends('admin.master')

@section('title')
    编辑管理员{{$admin->admin_name}} - 后台管理中心
@stop

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="{{url('admin')}}">首页</a></li>
        <li><a href="javascript:;">编辑管理员</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">编辑管理员
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
            <h4 class="panel-title">编辑管理员-{{$admin->admin_name}}</h4>
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
            <form class="form-horizontal" action="{{route('admin.admins.update',['admin_id'=>$admin->admin_id])}}"
                  method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put">
                <fieldset>
                    <legend>基本资料</legend>
                    <div class="form-group">
                        <label class="col-md-2 control-label">管理员名称</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="5-15个字符" name="admin_name"
                                   value="{{old('admin_name',$admin->admin_name)}}"/>
                            @if($errors->has('admin_name'))
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{$errors->first('admin_name')}}</li>
                                </ul>
                            @endif

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">管理员邮箱</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="E-Mail" name="email"
                                   value="{{old('email',$admin->email)}}"/>
                            @if($errors->has('email'))
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{$errors->first('email')}}</li>
                                </ul>
                            @endif

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">管理员状态</label>

                        <div class="col-md-8">
                            <select name="admin_status" class="form-control">
                                @foreach(App\Enum\Admin::$statusForm as $key=>$label)
                                    <option value="{{$key}}" @if($key == $admin->admin_status)
                                            selected @endif>{{$label}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('admin_status'))
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{$errors->first('admin_status')}}</li>
                                </ul>
                            @endif

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">管理员角色</label>

                        <div class="col-md-8">
                            <select name="admin_role" class="form-control">
                                @foreach(App\Enum\Admin::$rolesForm as $key=>$label)
                                    <option value="{{$key}}" @if($key == $admin->admin_role)
                                            selected @endif>{{$label}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('admin_role'))
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{$errors->first('admin_role')}}</li>
                                </ul>
                            @endif

                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>修改密码</legend>
                    <div class="form-group">
                        <label class="col-md-2 control-label">新密码</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="5-20个字符" name="admin_pass" value=""/>
                            @if($errors->has('admin_pass'))
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{$errors->first('admin_pass')}}</li>
                                </ul>
                            @endif

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">确认新密码</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="重复输入新密码" name="admin_pass_confirm"
                                   value=""/>
                            @if($errors->has('admin_pass_confirm'))
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{$errors->first('admin_pass_confirm')}}</li>
                                </ul>
                            @endif

                        </div>
                    </div>
                </fieldset>
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