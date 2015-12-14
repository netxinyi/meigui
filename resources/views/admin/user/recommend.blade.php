@extends('admin.master')

@section('title')
    会员管理 - 后台管理中心
@stop

@section('content')
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
                            <select class="form-control" name="page">
                                <option value="">全部</option>

                                <option value="{{\App\Enum\User::RECOMMEND_INDEX}}" {{queryActive('page',\App\Enum\User::RECOMMEND_INDEX,'selected')}}>
                                    首页
                                </option>
                                <option value="{{\App\Enum\User::RECOMMEND_HOME}}" {{queryActive('page',\App\Enum\User::RECOMMEND_HOME,'selected')}}>
                                    专区
                                </option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-sm-9">
                    <form class="form-inline pull-right" action="/admin/user" method="get">

                        <div class="form-group">
                            <div class="ui-widget">
                                <input type="text" class="form-control" placeholder="搜索会员" id="search-user">
                            </div>
                        </div>
                        <div class="form-group">


                        </div>
                        <button type="submit" class="btn btn-sm btn-primary m-r-5">搜索</button>
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
                                        <select class="form-control" style="width: 100px">
                                            <option value="{{\App\Enum\User::RECOMMEND_INDEX}}"
                                                    @if($user->page == \App\Enum\User::RECOMMEND_INDEX) selected @endif>
                                                首页
                                            </option>
                                            <option value="{{\App\Enum\User::RECOMMEND_HOME}}"
                                                    @if($user->page == \App\Enum\User::RECOMMEND_INDEX) selected @endif>
                                                专区页
                                            </option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" value="{{$user->order}}"
                                               style="width: 60px">
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
            console.log($('#search-user'));
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
                                        username: user.user_name,
                                        avatar: user.avatar,
                                        mobile: user.mobile,
                                        realname: user.realname,
                                        id:user.user_id
                                    });
                                })
                                console.log(params);
                            }
                        }
                    });
                }
            }).data("uiAutocomplete")._renderItem = function () {
                console.log(arguments, this);
            };

        });
    </script>

@stop
