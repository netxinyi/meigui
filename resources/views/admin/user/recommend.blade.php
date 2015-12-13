@extends('admin.master')

@section('title')
    会员管理 - 后台管理中心
@stop
<style>
    /*.table > thead > tr > th{text-align: center;}*/
</style>
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
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <thead>
                    <tr>
                        <th>用户ID</th>
                        <th>用户头像</th>
                        <th>性别</th>
                        <th>会员级别</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->user_id}}</td>
                            <td>

                                <a href="/admin/user/{{$user->user_id}}/edit">
                                    <img src="{{$user->user->avatar}}" height="100">
                                    {{$user->user->user_name}}
                                </a>

                            <td> {{$user->user->sex}}</td>
                            <td>{{$user->user->level_lang}}</td>
                            <td class="text-center">
                                @if($user->page=="不推荐")
                                   <button class="btn btn-sm btn-success  m-r-5"   onclick="shenhe({{$user->id}},'首页')">网站首页展示</button>
                                   <button class="btn btn-sm btn-success  m-r-5"   onclick="shenhe({{$user->id}},'会员专区')">会员专区展示</button> 
                                    
                                @else
                                   在{{$user->page}}展示中，点击
                                   <button class="btn btn-sm btn-info  m-r-5"   onclick="shenhe({{$user->id}},'不推荐')">取消推荐</button>
                                @endif
                                
                               
                            </td>
                        </tr>
                    @endforeach
                    
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
    <script src="/assets/js/common/common.js"></script>
    <script src="/assets/admin/js/apps.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <script type="text/javascript">
        $(document).ready(function () {
            TableManageColVis.init();
        });
    </script>

    <script>

    // 审核
    function shenhe(id,str){
        var token = $("input[name='_token']").val();
       
        $.rest({
         url:'/admin/user/setRecommendPage',
         method:'post',
         data:{id:id,_token:token,page:str}
        });

       $.alert("操作成功","success");

    }
    </script>
@stop

@section('last-css')
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="/assets/lib/DataTables/css/data-table.css" rel="stylesheet"/>
    <!-- ================== END PAGE LEVEL STYLE ================== -->
@stop