@extends('admin.master')

@section('title')
    报名审核 - 后台管理中心
    @stop

    @section('content')

            <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">报名审核</h4>
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
            <div class="table-responsive">
                <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>真实姓名</th>
                        <th>性别</th>
                        <th>年龄</th>
                        <th>手机号</th>
                        <th>婚姻状态</th>
                        <th>生日</th>
                        <th>申请时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->realname}}</td>
                            <td>{{$user->sex_lang}}</td>
                            <td>{{$user->age_lang}}</td>
                            <td>{{$user->mobile}}</td>
                            <td>{{$user->marriage_lang}}</td>
                            <td>{{$user->birthday}}</td>
                            <td>{{$user->created_at}}</td>
                            <td class="text-center">
                                <a href="/admin/user/{{$user->user_id}}/edit"
                                   class="btn btn-sm btn-success  m-r-5">通过审核</a>
                                <a href="{{route('admin.register.destroy',[$user->id])}}"
                                   class="btn btn-sm btn-danger">拒绝申请</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end panel -->



    @stop

    @section('footer-last-js')
            <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/assets/lib/DataTables/js/jquery.dataTables.js"></script>
    <script src="/assets/lib/DataTables/js/dataTables.colVis.js"></script>
    <script src="/assets/admin//js/table-manage-colvis.demo.min.js"></script>
    <script src="/assets/admin/js/apps.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <script type="text/javascript">
        $(document).ready(function () {
            TableManageColVis.init();
        });
    </script>
    @stop

    @section('last-css')
            <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="/assets/lib/DataTables/css/data-table.css" rel="stylesheet"/>
    <!-- ================== END PAGE LEVEL STYLE ================== -->
@stop