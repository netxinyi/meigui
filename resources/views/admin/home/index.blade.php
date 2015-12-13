@extends('admin.master')

@section('content')

    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6 hidden-xs">
            <div class="widget widget-stats bg-green">
                <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                <div class="stats-info">
                    <h4>待审核会员</h4>

                    <p>{{$user_shenhe_num}} 个</p>
                </div>
                <div class="stats-link">
                    <a href="/admin/user?status={{\App\Enum\User::STATUS_CHECK}}">[总会员: {{$user_all_num}}] - [普通会员：{{$user_level2_num}}] - [高端会员：{{$user_level3_num}}]</a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6 hidden-xs">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>自我介绍待审核</h4>

                    <p>{{$user_info_num}} 个</p>
                </div>
                <div class="stats-link">
                    <a href="/admin/user/introduce">点击查看审核</a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6 hidden-xs">
            <div class="widget widget-stats bg-purple">
                <div class="stats-icon"><i class="fa fa-comment"></i></div>
                <div class="stats-info">
                    <h4>会员相片审核</h4>

                    <p>{{$user_gallery_num}} 张</p>
                </div>
                <div class="stats-link">
                    <a href="/admin/user/gallerylist">点击查看审核</a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6 hidden-xs">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-edit"></i></div>
                <div class="stats-info">
                    <h4>文章数</h4>

                    <p>{{$user_info_num}} 篇</p>
                </div>
                <div class="stats-link">
                    <a href="{{route('admin.article.index')}}">点击查看</a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
    <!-- end row -->
@stop
