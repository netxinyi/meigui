@extends('admin.master')

@section('title')
    会员列表 - 后台管理中心
@stop

@section('content')

    <div class="p-20">
        <!-- begin row -->
        <div class="row">
            <!-- begin col-2 -->
            <div class="col-md-2">

                <div class="hidden-sm hidden-xs">
                    <form action="" method="get">
                        <div class="form-group">
                            <label>关键词</label>
                            <input type="text" name="keyword" class="form-control input-sm input-white"
                                   placeholder="昵称/姓名/手机号" value="{{Request::get('keyword')}}">
                        </div>
                        <div class="form-group">
                            <label>性别</label>
                            <select class="form-control input-sm input-white" name="sex">
                                <option value="-1">不限制</option>
                                @foreach(\App\Enum\User::$sexLang as $val=>$label)
                                    <option value="{{$val}}" {{queryActive('sex',$val,'selected')}}>{{$label}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>最小年龄</label>
                            <select class="form-control input-sm input-white" name="age_start">
                                <option value="-1">不限制</option>
                                @for($i=18;$i<=70;$i++)
                                    <option value="{{$i}}" {{queryActive('age_start',$i,'selected')}}>{{$i}} 岁</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label>最大年龄</label>
                            <select class="form-control input-sm input-white" name="age_end">
                                <option value="-1">不限制</option>
                                @for($i=18;$i<=70;$i++)
                                    <option value="{{$i}}" {{queryActive('age_end',$i,'selected')}}>{{$i}} 岁</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label>会员状态</label>
                            <select class="form-control input-sm input-white" name="status">
                                <option value="-1">不限制</option>
                                @foreach(\App\Enum\User::$statusLang as $val=>$label)
                                    <option value="{{$val}}" {{queryActive('status',$val,'selected')}}>{{$label}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>会员等级</label>
                            <select class="form-control input-sm input-white" name="level">
                                <option value="-1">不限制</option>
                                @foreach(\App\Enum\User::$levelLang as $val=>$label)
                                    <option value="{{$val}}" {{queryActive('level',$val,'selected')}}>{{$label}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-inverse btn-xs">提交</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end col-2 -->
            <!-- begin col-10 -->
            <div class="col-md-10">
                <form method="post">
                    <div class="email-content">
                        <table class="table table-email">
                            <thead>
                            <tr>
                                <th class="email-select">
                                    <a href="#" data-click="email-select-all">
                                        <i class="fa fa-square-o fa-fw"></i>

                                    </a>
                                </th>
                                <th>
                                    昵称
                                </th>
                                <th>
                                    性别
                                </th>
                                <th>
                                    年龄
                                </th>
                                <th>
                                    手机号
                                </th>
                                <th>
                                    会员等级
                                </th>

                                <th>
                                    注册时间
                                </th>
                                <th>
                                    操作
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i
                                                    class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        {{$user->user_name}}
                                    </td>
                                    <td>
                                        {{$user->sex_lang}}
                                    </td>
                                    <td>
                                        {{$user->age_lang}}
                                    </td>
                                    <td>
                                        {{$user->mobile}}
                                    </td>
                                    <td>
                                        {{$user->level_lang}}
                                    </td>

                                    <td class="email-date">{{$user->created_at}}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm"
                                           href="/admin/user/{{$user->user_id}}/edit">编辑</a>
                                        <a class="btn btn-danger btn-sm" href="/admin/user/{{$user->user_id}}"
                                           data-method="delete">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="email-footer clearfix">
                            共 {{$users->total() }} 条记录
                            <?php echo str_replace('pagination', 'pagination pagination-sm m-t-0 m-b-0 pull-right', $users->render());?>

                        </div>
                    </div>
                </form>
            </div>
            <!-- end col-10 -->
        </div>
        <!-- end row -->
    </div>

    @stop

    @section('footer-last-js')
            <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/assets/admin/js/apps.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

@stop
