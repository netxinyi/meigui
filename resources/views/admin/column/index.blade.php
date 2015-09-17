@extends('admin.master')

@section('title')
    栏目列表 - 后台管理中心
@stop

@section('content')

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>
            </div>
            <h4 class="panel-title">栏目列表</h4>
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
                        <th>栏目名称</th>
                        <th>文章数量</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($models as $model)
                        <tr>
                            <td>{{$model->column_id}}</td>
                            <td>{{$model->column_name}}</td>
                            <td>{{$model->articles()->count()}}</td>
                            <td>{{$model->created_at}}</td>
                            <td class="text-center">
                                <a href="{{route('admin.column.edit',['column_id'=>$model->column_id])}}"
                                   class="btn btn-sm btn-success  m-r-5">编辑</a>
                                <a href="{{route('admin.column.destroy',['column_id'=>$model->column_id])}}"
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