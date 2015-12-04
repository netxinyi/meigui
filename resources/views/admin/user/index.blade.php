@extends('admin.master')

@section('title')
    会员列表 - 后台管理中心
    @stop

    @section('content')

            <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">会员列表</h4>
        </div>
        @if($errors->has('success'))
            <div class="alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">×</span>
                </button>
                {{$errors->first('success')}}
            </div>
        @endif
        @if($errors->has('error'))
            <div class="alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">×</span>
                </button>
                {{$errors->first('error')}}
            </div>
        @endif

        <div class="panel-body">
            <div class="btn-group m-r-5 m-b-5">
                <a href="javascript:;" data-toggle="dropdown"
                   class="btn btn-default dropdown-toggle">{{array_get(\App\Enum\User::$statusLang,Request::get('status',-1),"全部状态")}}
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="?status=-1">全部状态</a></li>
                    <li>
                        <a href="?status={{\App\Enum\User::STATUS_OK}}">{{\App\Enum\User::$statusLang[\App\Enum\User::STATUS_OK]}}</a>
                    </li>
                    <li>
                        <a href="?status={{\App\Enum\User::STATUS_CHECK}}">{{\App\Enum\User::$statusLang[\App\Enum\User::STATUS_CHECK]}}</a>
                    </li>
                    <li>
                        <a href="?status={{\App\Enum\User::STATUS_NOCHECK}}">{{\App\Enum\User::$statusLang[\App\Enum\User::STATUS_NOCHECK]}}</a>
                    </li>

                </ul>
            </div>
            <br/>

            <div class="table-responsive">
                <table id="data-table" class="table table-hover">
                    <thead>
                    <tr>
                        <th>用户ID</th>
                        <th>昵称</th>
                        <th>性别</th>
                        <th>年龄</th>
                        <th>手机号</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->user_id}}</td>
                            <td>{{$user->user_name}}</td>
                            <td>{{$user->sex_lang}}</td>
                            <td>{{$user->age}}</td>
                            <td>{{$user->mobile}}</td>

                            <td>{{$user->created_at}}</td>
                            <td class="text-center">
                                <a href="/admin/user/{{$user->user_id}}/edit"
                                   class="btn btn-sm btn-success  m-r-5">编辑</a>
                                <a href="admin/user/{{$user->user_id}}"
                                   class="btn btn-sm btn-danger" data-method="delete">删除</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>
        <div class="panel-footer text-right">
            <?php echo $users->render();?>
        </div>
    </div>
    <!-- end panel -->



    @stop

    @section('footer-last-js')
            <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/assets/admin/js/apps.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

@stop
