@extends('admin.master')

@section('title')
    会员管理 - 后台管理中心
@stop

@section('content')
    <style>
        .ui-menu-item {
            padding: 5px;

        }

        .ui-menu-item a {
            display: block;
        }

        .ui-menu .ui-menu-item a:after {
            content: " ";
            display: table;
            clear: both;
        }

        .ui-menu-item:after {
            display: table;
            clear: both;
            float: none;
            content: " ";
        }

        .ui-menu-item .avatar {
            width: 50px;
            float: left;
        }

        .ui-menu-item .info {
            float: right;
        }

        .ui-menu-item .info span {
            display: block;

        }
    </style>
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">

            </div>
            <h4 class="panel-title">会员列表</h4>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-3">
                    <form class="form-inline" action="admin/user/recommend" method="get">
                        <div class="form-group m-r-10">
                            <span>推荐位置</span>
                            <select class="form-control" name="type" id="change-page">
                                <option value="">全部</option>

                                <option value="{{\App\Enum\User::RECOMMEND_INDEX}}" {{queryActive('type',\App\Enum\User::RECOMMEND_INDEX,'selected')}}>
                                    首页
                                </option>
                                <option value="{{\App\Enum\User::RECOMMEND_HOME}}" {{queryActive('type',\App\Enum\User::RECOMMEND_HOME,'selected')}}>
                                    专区
                                </option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-sm-9">
                    <form class="form-inline pull-right" action="/admin/user/add-recommend" method="post" id="add-form">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group">
                            <div class="ui-widget">
                                <input type="text" class="form-control" placeholder="搜索会员" id="search-user"
                                       name="user_id">
                            </div>
                        </div>
                        <div class="form-group m-r-10">
                            <span>推荐位置</span>
                            <select class="form-control" name="page">
                                <option value="{{\App\Enum\User::RECOMMEND_INDEX}}" {{queryActive('page',\App\Enum\User::RECOMMEND_INDEX,'selected')}}>
                                    首页
                                </option>
                                <option value="{{\App\Enum\User::RECOMMEND_HOME}}" {{queryActive('page',\App\Enum\User::RECOMMEND_HOME,'selected')}}>
                                    专区
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="ui-widget">
                                <span>排序</span>
                                <input type="number" class="form-control" style="width: 100px" value="0" name="order">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary m-r-5">添加</button>
                    </form>
                </div>
            </div>


            <br>

            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>昵称</th>
                                <th>性别</th>
                                <th>年龄</th>
                                <th>会员等级</th>
                                <th>推荐位置</th>
                                <th>排序</th>
                                <th>删除</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->user_id}}</td>
                                    <td>{{$user->user->user_name}}</td>
                                    <td>{{$user->user->sex_lang}}</td>
                                    <td>{{$user->user->age_lang}}</td>
                                    <td>{{$user->user->level_lang}}</td>
                                    <td>
                                        {{$user->page}}
                                    </td>
                                    <td>
                                        {{$user->order}}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" data-click="delete"
                                                data-id="{{$user->id}}">
                                            删除
                                        </button>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <span style="line-height: 30px">共 {{$users->total() }} 条记录</span>

            <?php echo str_replace('pagination', 'pagination pagination-sm m-t-0 m-b-0 pull-right', $users->render());?>

        </div>
    </div>

@stop

@section('footer-last-js')

    <script src="/assets/js/common/common.js"></script>
    <script src="/assets/admin/js/apps.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->



    <script type="text/javascript">

        $(function () {

            $('#search-user').autocomplete({
                source: function (request, response) {
                    var key = request.term;
                    $.ajax({
                        url: "/admin/user/key",
                        data: {keyword: key},
                        success: function (ret) {
                            if (ret.code == 1000 && $.isArray(ret.data) && ret.data.length > 0) {
                                var params = [];
                                $.each(ret.data, function (index, user) {
                                    params.push({
                                        label: user.user_name,
                                        value: user.user_id,
                                        avatar: user.avatar,
                                        mobile: user.mobile,
                                        realname: user.realname
                                    });
                                })
                                response(params);
                            }
                        }
                    });
                }
            }).data("uiAutocomplete")._renderItem = function (widget, ret) {
                var $a = $('<a></a>');
                var $li = $('<li class="user-list-item"></li>').append($a);


                $('<div class="avatar"><img src="' + ret.avatar + '" width="50px" height="50px" /></div>').appendTo($a);
                $('<div class="info"><span>' + ret.label + " (" + ret.value + ')</span><span>' + ret.realname + '</span><span>' + ret.mobile + '</span></div>').appendTo($a);


                return $li.data("item.autocomplete", ret).appendTo(widget);
            };


            $('#add-form').form().success(function () {
                $.redirect(null, 1500);
            });

            $('[data-click="delete"]').click(function () {
                var id = $(this).data("id");
                if (confirm("确定要这么做吗?")) {
                    $.ajax({
                        url: "/admin/user/deleteRecommend",
                        data: {id: id},
                        method: "get",
                        success: function (ret) {
                            if (ret.code == 1000) {
                                $.alert("删除成功", "success");
                                $.redirect(null, 1500);
                            } else {
                                $.alert(ret.msg, "danger");
                            }
                        },
                        error: function () {
                            $.alert("抱歉,删除失败,请稍后再试", "danger");
                        }
                    });
                }
            });

            $('#change-page').change(function () {
                window.location.href = location.origin + location.pathname + "?type=" + $(this).val();
            });
        });
    </script>

@stop
