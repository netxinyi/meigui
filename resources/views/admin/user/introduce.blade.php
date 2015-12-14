@extends('admin.master')

@section('title')
    会员管理 - 后台管理中心
    @stop

    @section('content')
            <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">

            </div>
            <h4 class="panel-title">自我介绍审核</h4>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="data-table" class="table table-striped">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>昵称</th>
                        <th>自我介绍</th>
                        <th width="150">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->user_id}}</td>
                            <td>
                                <a href="/admin/user/{{$user->user_id}}/edit" target="_blank">
                                    {{$user->user->user_name}}
                                </a>
                            </td>
                            <td>
                                {{$user->new_introduce}}
                            </td>

                            <td>
                                <button class="btn btn-xs btn-info" data-status="{{\App\Enum\User::INTRODUCE_OK}}"
                                        data-id="{{$user->user_id}}">通过
                                </button>
                                <button class="btn btn-xs btn-danger"
                                        data-status="{{\App\Enum\User::INTRODUCE_NOCHECK}}"
                                        data-id="{{$user->user_id}}">拒绝
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
        <div class="panel-footer">
            <span style="line-height: 30px">共 {{$users->total() }} 条记录</span>

            <?php echo str_replace('pagination', 'pagination pagination-sm m-t-0 m-b-0 pull-right', $users->render());?>

        </div>
    </div>
    <!-- end panel -->



@stop

@section('footer-last-js')

    <script src="/assets/js/common/common.js"></script>
    <script src="/assets/admin/js/apps.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->



    <script>

        $(function () {

            $('[data-status]').click(function () {
                if (confirm("确定要这么做吗?")) {
                    var status = $(this).data("status");
                    var id = $(this).data("id");
                    $.ajax({
                        url: '/admin/user/setIntroduceStatus',
                        method: 'post',
                        data: {user_id: id, _token: "{{csrf_token()}}", status: status},
                        success: function (ret) {
                            if (ret.code == 1000) {
                                $.alert("修改介绍状态成功", "success");
                                $.redirect(null, 1500);
                            } else {
                                $.alert(ret.msg, "danger")
                            }
                        },
                        error: function () {
                            $.alert("修改介绍状态失败,请稍后再试", "danger");
                        }
                    });
                }
            });
        });

    </script>
@stop
