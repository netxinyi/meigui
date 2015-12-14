@extends('admin.master')

@section('title')
    会员列表 - 后台管理中心
@stop

@section('content')

    <div class="panel panel-inverse" data-sortable-id="table-basic-7">
        <div class="panel-heading">
            <div class="panel-heading-btn">

            </div>
            <h4 class="panel-title">会员列表</h4>
        </div>
        <div class="panel-body">
            <form class="form-inline" action="/admin/user" method="get">

                <div class="form-group m-r-10">
                    <span>账号状态</span>
                    <select class="form-control" name="status">
                        <option value="">不限制</option>
                        @foreach(\App\Enum\User::$statusLang as $value=>$label)
                            <option value="{{$value}}" {{queryActive('status',$value,'selected')}}>{{$label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group m-r-10">
                    <span>会员等级</span>
                    <select class="form-control" name="level">
                        <option value="">不限制</option>
                        @foreach(\App\Enum\User::$levelLang as $value=>$label)
                            <option value="{{$value}}" {{queryActive('level',$value,'selected')}}>{{$label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group m-r-10">
                    <span>性别</span>
                    <select class="form-control" name="sex">
                        <option value="">不限制</option>
                        @foreach(\App\Enum\User::$sexLang as $value=>$label)
                            <option value="{{$value}}" {{queryActive('sex',$value,'selected')}}>{{$label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group m-r-10">
                    <span>年龄</span>
                    <select class="form-control" name="age_start">
                        <option value="">不限制</option>
                        @for($i=18;$i<=70;$i++)
                            <option value="{{$i}}" {{queryActive('age_start',$i,'selected')}}>{{$i}}岁</option>
                        @endfor
                    </select>
                    <span> - </span>
                </div>
                <div class="form-group m-r-10">
                    <select class="form-control" name="age_end">
                        <option value="">不限制</option>
                        @for($i=18;$i<=70;$i++)
                            <option value="{{$i}}" {{queryActive('age_end',$i,'selected')}}>{{$i}}岁</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group m-r-10">

                    <input type="text" class="form-control" placeholder="ID/手机号/姓名/昵称" name="keyword"
                           value="{{Request::get('keyword')}}">
                </div>
                <button type="submit" class="btn btn-sm btn-primary m-r-5">搜索</button>

            </form>
            <br>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>昵称</th>
                        <th>真实姓名</th>
                        <th>手机号</th>
                        <th>性别</th>
                        <th>年龄</th>
                        <th>会员等级</th>
                        <th>帐号状态</th>
                        <th>报名人数</th>
                        <th>注册时间</th>

                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->user_id}}</td>
                            <td>{{$user->user_name}}</td>
                            <td>{{$user->realname}}</td>
                            <td>{{$user->mobile}}</td>
                            <td>{{$user->sex_lang}}</td>
                            <td>{{$user->age_lang}}</td>
                            <td>{{$user->level_lang}}</td>
                            <td>{{$user->status_lang}}</td>
                            <td>{{$user->likeMe->count()}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <a href="/admin/user/{{$user->user_id}}/edit" class="btn btn-xs btn-success">
                                    编辑
                                </a>
                                <button type="button" class="btn btn-danger btn-xs" data-click="delete"
                                        data-id="{{$user->user_id}}">
                                    删除
                                </button>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <span style="line-height: 30px">共 {{$users->total() }} 条记录</span>

            <?php echo str_replace('pagination', 'pagination pagination-sm m-t-0 m-b-0 pull-right', $users->render());?>

        </div>
    </div>

    @stop

    @section('footer-last-js')
            <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/assets/admin/js/apps.min.js"></script>
    <script src="/assets/js/common/common.js"></script>

    <!-- ================== END PAGE LEVEL JS ================== -->

    <script>
        $('[data-click="delete"]').click(function () {
            if (confirm("确定要删除该会员吗?")) {
                var id = $(this).data("id");
                var $tr = $(this).closest('tr');
                $.ajax({
                    url: "/admin/user/" + id,
                    method: "delete",
                    data: {_token: "{{csrf_token()}}"},
                    success: function (ret) {
                        if (ret.code == 1000) {
                            $.alert("删除成功", "success");
                            $tr.remove();
                        } else {
                            $.alert(ret.msg, "danger");
                        }
                    },
                    error: function () {
                        $.alert("抱歉,删除失败,请稍后再试", "danger");
                    }
                });
            }
            return false;
        });
    </script>

@stop
