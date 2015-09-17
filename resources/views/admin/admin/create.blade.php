@extends('admin.master')

@section('title')
    添加管理员 - 后台管理中心
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
            <h4 class="panel-title">添加管理员</h4>
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
            <form class="form-horizontal" action="{{route('admin.admins.store')}}"
                  method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">


                <div class="form-group">
                    <label class="col-md-2 control-label">管理员名称</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="5-15个字符" name="admin_name"
                               value="{{old('admin_name')}}"/>
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
                               value="{{old('email')}}"/>
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
                                <option value="{{$key}}" @if($key == old('admin_status'))
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
                                <option value="{{$key}}" @if($key == old('admin_role'))
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
                <div class="form-group">
                    <label class="col-md-2 control-label">密码</label>

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
                    <label class="col-md-2 control-label">确认密码</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="重复输入密码" name="admin_pass_confirm"
                               value=""/>
                        @if($errors->has('admin_pass_confirm'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('admin_pass_confirm')}}</li>
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