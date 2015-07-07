@extends('admin.master')

@section('title')
    编辑会员- {{$user->user_name}} - 后台管理中心
@stop

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="{{url('admin')}}">首页</a></li>
        <li><a href="javascript:;">编辑会员</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">编辑会员
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
            <h4 class="panel-title">编辑会员-{{$user->user_name}}</h4>
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
            <form class="form-horizontal" action="{{route('admin.user.update',['user'=>$user->user_id])}}"
                  method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put">
                <fieldset>
                    <legend>基本信息</legend>
                    <div class="form-group">
                        <label class="col-md-2 control-label">会员昵称</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="2-15个字符" name="user_name"
                                   value="{{old('user_name',$user->user_name)}}" required=""/>
                            @if($errors->has('user_name'))
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{$errors->first('user_name')}}</li>
                                </ul>
                            @endif

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">邮箱</label>

                        <div class="col-md-8">
                            <input type="email" class="form-control" placeholder="E-Mail" name="email"
                                   value="{{old('email',$user->email)}}" required=""/>
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
                                   value="{{old('mobile',$user->mobile)}}" required/>
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
                            <input type="date" class="form-control" name="birthday"
                                   value="{{old('birthday',$user->birthday)}}"
                                   required/>
                            @if($errors->has('birthday'))
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{$errors->first('birthday')}}</li>
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
                                           value="{{$value}}" @if($value == old('sex',$user->sex))
                                           checked @endif >
                                    {{$lable}}
                                </label>
                            @endforeach
                            @if($errors->has('sex'))
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{$errors->first('sex')}}</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>其他资料</legend>
                    <div class="form-group">
                        <label class="col-md-2 control-label">婚姻状况</label>

                        <div class="col-md-8">
                            @foreach(\App\Enum\User::$maritalForm as $value=>$lable)

                                <label class="radio-inline">
                                    <input type="radio" name="marital_status"
                                           value="{{$value}}" @if($value == old('marital_status',$user->marital_status))
                                           checked @endif >
                                    {{$lable}}
                                </label>
                            @endforeach
                            @if($errors->has('marital_status'))
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{$errors->first('marital_status')}}</li>
                                </ul>
                            @endif

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">身高</label>

                        <div class="col-md-8">
                            <select name="height" class="form-control">
                                <option value="">请选择</option>
                                @for($i=130; $i <=210;$i++)
                                    <option value="{{$i}}" @if(old('height',$user->height) == $i)
                                            selected @endif >{{$i}} cm
                                    </option>
                                @endfor
                            </select>
                            @if($errors->has('height'))
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{$errors->first('height')}}</li>
                                </ul>
                            @endif

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">教育程度</label>


                        <div class="col-md-8">
                            <select name="education" class="form-control">
                                <option value="">请选择</option>
                                @foreach(\App\Enum\User::$educationForm as $value=>$lable)
                                    <option value="{{$value}}" @if(old('education',$user->education) == $value)
                                            selected @endif>{{$lable}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('education'))
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{$errors->first('education')}}</li>
                                </ul>
                            @endif

                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">月收入</label>

                        <div class="col-md-8">
                            <select name="salary" class="form-control">
                                <option value="">请选择</option>
                                @foreach(\App\Enum\User::$salaryForm as $value=>$lable)
                                    <option value="{{$value}}" @if(old('salary',$user->salary) == $value)
                                            selected @endif>{{$lable}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('salary'))
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{$errors->first('salary')}}</li>
                                </ul>
                            @endif

                        </div>

                    </div>
                    <div class="form-group" id="area-select">
                        <label class="col-md-2 control-label">所在地</label>

                        <div class="col-md-2">
                            <select class="form-control default-select2" name="province">

                            </select>
                        </div>

                        <div class="col-md-2">
                            <select class="form-control" name="city">

                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" name="area">

                            </select>
                        </div>
                    </div>

                </fieldset>
                <fieldset>
                    <legend>修改密码</legend>
                    <div class="form-group">
                        <label class="col-md-2 control-label">新密码</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="5-20个字符" name="password" value=""/>
                            @if($errors->has('password'))
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{$errors->first('password')}}</li>
                                </ul>
                            @endif

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">确认新密码</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="重复输入新密码" name="password_confirm"
                                   value=""/>
                            @if($errors->has('password_confirm'))
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{$errors->first('password_confirm')}}</li>
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
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="/assets/lib/pcas/pcas.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <script type="text/javascript">
        $(document).ready(function () {
            new PCAS("province", "city", "area", "{{old('province',$user->province)}}", "{{old('city',$user->city)}}", "{{old('area',$user->area)}}");


        });


    </script>
@stop

@section('last-css')

@stop