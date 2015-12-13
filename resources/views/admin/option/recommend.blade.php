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
            <h4 class="panel-title">会员展示推荐</h4>
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
                        <th>用户名</th>
                        <th>审核状态</th>
                        <th>新的自我介绍</th>
                        <th>状态</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($UserInfo as $UserInfo)
                        <tr>
                            <td>{{$UserInfo->user_id}}</td>
                            <td>{{$UserInfo['status']}}</td>
                            <td>{{$UserInfo['new_introduce']}}</td>
                            
                            <td>{{$UserInfo['stock']}}</td>
                            <td>{{$UserInfo['origin_province']}}</td>
                            <td>{{$UserInfo['origin_city']}}</td>
                            <td>{{$UserInfo['introduce']}}</td>
                         
                            <td>{{$UserInfo['card']}}</td>
                            <td>{{$UserInfo['email']}}</td>
                            <td class="text-center">
                                <a href="{{route('admin.admins.edit',['user_id'=>$UserInfo['user_id']])}}"
                                   class="btn btn-sm btn-success  m-r-5">编辑</a>
                                <a href="{{route('admin.admins.destroy',['user_id'=>$UserInfo['user_id']])}}"
                                   class="btn btn-sm btn-danger" data-method="delete">删除</a>
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