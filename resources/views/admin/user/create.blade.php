@extends('admin.master')

@section('title')
    添加会员 - 后台管理中心
@stop

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="{{url('admin')}}">首页</a></li>
        <li><a href="javascript:;">添加会员</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">添加会员
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
            <h4 class="panel-title">添加会员</h4>
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
                    <label class="col-md-2 control-label">会员昵称</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="5-15个字符" name="user_name"
                               value="{{old('user_name')}}"/>
                        @if($errors->has('user_name'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('user_name')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">性别</label>

                    <div class="col-md-8">
                        @foreach(\App\Enum\User::$sexForm as $value=>$lable)

                            <label class="radio-inline">
                                <input type="radio" name="sex"
                                       value="{{$value}}" @if($value == old('sex',\App\Enum\User::SEX_MALE))
                                       checked @endif >
                                {{$lable}}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="form-group" id="area-select">
                    <label class="col-md-2 control-label">所在地</label>

                    <div class="col-md-2">
                        <select class="form-control default-select2" name="province_id" data-level="0">
                            <option>请选择</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-control" name="city_id" data-level="1">
                            <option>请选择</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" name="area_id" data-level="2">
                            <option>请选择</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">邮箱</label>

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
                    <label class="col-md-2 control-label">手机号</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="手机号" name="mobile"
                               value="{{old('mobile')}}"/>
                        @if($errors->has('mobile'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('mobile')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">出生日期</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" name="birthday" value="{{old('birthday')}}"/>
                        @if($errors->has('birthday'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('birthday')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">密码</label>

                    <div class="col-md-8">
                        <input type="password" class="form-control" placeholder="5-20个字符" name="password" value=""/>
                        @if($errors->has('password'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('password')}}</li>
                            </ul>
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">确认密码</label>

                    <div class="col-md-8">
                        <input type="password" class="form-control" placeholder="重复输入密码" name="password_confirm"
                               value=""/>
                        @if($errors->has('password_confirm'))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{$errors->first('password_confirm')}}</li>
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
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <script type="text/javascript">
        $(document).ready(function () {
            $("input[name='birthday']").datepicker({
                todayHighlight: true,
                autoclose: true,
                format: "yyyy-mm-dd"

            });

            function mkArea(dom, provid) {

                $.get('/api/area/' + provid, function (ret) {
                    var provinces = ret.data;
                    var select = $(dom);
                    $(select).html('<option>请选择</option>');
                    for (var i in provinces) {

                        $(select).append('<option value="' + i + '">' + provinces[i].name + "</option>");
                    }

                });
            }

            $('#area-select select').change(function () {

                var index = $(this).data('level') + 1;
                var next = $('#area-select').find('select[data-level="' + index + '"]');
                if (next.length > 0) {
                    mkArea($('#area-select').find('select[data-level="' + index + '"]'), $(this).val());
                }
            });
            mkArea($('#area-select select')[0], 0);

        });


    </script>
@stop

@section('last-css')
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="/assets/lib/bootstrap-datepicker/css/datepicker.css" rel="stylesheet"/>

    <!-- ================== END PAGE LEVEL STYLE ================== -->
@stop