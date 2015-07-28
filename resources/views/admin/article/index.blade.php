@extends('admin.master')

@section('title')
    文章列表 - 后台管理中心
@stop

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="{{url('admin')}}">首页</a></li>
        <li><a href="javascript:;">文章列表</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">文章列表
        <small></small>
    </h1>
    <!-- end page-header -->


    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">文章列表</h4>
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
                        <th>ID</th>
                        <th>文章标题</th>
                        <th>所属栏目</th>
                        <th>作者</th>
                        <th>评论数量</th>
                        <th>发表时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($models as $model)
                        <tr>
                            <td>{{$model->article_id}}</td>
                            <td>{{$model->title}}</td>
                            <td>{{$model->column->column_name}}</td>
                            <td>{{$model->admin->admin_name}}</td>

                            <td>{{$model->comments()->count()}}</td>
                            <td>{{$model->created_at}}</td>
                            <td class="text-center">
                                <a href="{{route('admin.article.edit',['article_id'=>$model->article_id])}}"
                                   class="btn btn-sm btn-success  m-r-5">编辑</a>
                                <a href="{{route('admin.article.destroy',['article_id'=>$model->article_id])}}"
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