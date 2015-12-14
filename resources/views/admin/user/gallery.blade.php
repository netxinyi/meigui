@extends('admin.master')

@section('title')
    会员管理 - 后台管理中心
    @stop
    @section('content')
            <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">会员照片审核</h4>
        </div>
        @if($errors->has('error'))
            <div class="alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">×</span>
                </button>
                {{$errors->first('error')}}
            </div>
        @endif
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>昵称</th>
                        <th>真实姓名</th>
                        <th>手机号</th>
                        <th>性别</th>
                        <th>年龄</th>
                        <th></th>
                        <th>操作</th>
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
                            <td>{{$user->user->realname}}</td>
                            <td>{{$user->user->mobile}}</td>
                            <td>{{$user->user->sex_lang}}</td>
                            <td>{{$user->user->age_lang}}</td>
                            <td>
                                <a href="{{$user->image_url}}" target="_blank">
                                    <img src="{{$user->image_url}}" height="100" width="100">
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success btn-xs" data-click="ok"
                                        data-id="{{$user->photo_id}}" data-status="{{\App\Enum\User::GALLERY_OK}}">
                                    通过
                                </button>
                                <button type="button" class="btn btn-danger btn-xs" data-click="delete"
                                        data-id="{{$user->photo_id}}" data-status="{{\App\Enum\User::GALLERY_NOCHECK}}">
                                    拒绝
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
    <!-- end panel -->



    @stop

    @section('footer-last-js')
            <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/assets/js/common/common.js"></script>
    <script src="/assets/admin/js/apps.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->



    <script>

        $(function () {

            $('[data-status]').click(function () {
                if (confirm("确定要这么做吗?")) {
                    var id = $(this).data("id");
                    var status = $(this).data("status");
                    $.ajax({
                        url: "/admin/user/setGalleryStatus",
                        method: "post",
                        data: {photo_id: id, _token: "{{csrf_token()}}", status: status},
                        success: function (ret) {
                            if (ret.code == 1000) {
                                $.alert("修改照片状态成功", "success");
                                $.redirect(null, 1500);
                            } else {
                                $.alert(ret.msg)
                            }
                        },
                        error: function () {
                            $.alert("修改照片状态失败,请稍后再试", "danger");
                        }
                    });
                }
            });

        });

    </script>
@stop