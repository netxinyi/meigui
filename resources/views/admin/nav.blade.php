<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar nav -->
        <ul class="nav">
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                            class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
            <li class="nav-header">管理菜单</li>
            <li>
                <a href="{{url('admin')}}">
                    <i class="fa fa-home"></i>
                    <span>首页</span>
                </a>
            </li>
            <li>
                <a href="{{url('admin/option')}}">
                    <i class="fa fa-cogs"></i>
                    <span>网站设置</span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-bookmark"></i>
                    <span>文章管理</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('admin.article.index')}}">文章列表</a></li>
                    <li><a href="{{route('admin.article.create')}}">发表文章</a></li>
                    <li><a href="{{route('admin.column.index')}}">栏目管理</a></li>
                    <li><a href="{{route('admin.column.create')}}">发布栏目</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-users"></i>
                    <span>会员管理</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('admin.user.index')}}">会员列表</a></li>
                    <li><a href="{{route('admin.user.create')}}">添加会员</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-crosshairs"></i>
                    <span>成功案例</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('admin.case.index')}}">案例列表</a></li>
                    <li><a href="{{route('admin.case.create')}}">添加案例</a></li>
                </ul>
            </li>
            @if(Auth::check() && Auth::user()->admin_role == App\Enum\Admin::ROLE_SUPERADMIN)
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-user"></i>
                        <span>管理员管理</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{route('admin.admins.index')}}">管理员列表</a></li>
                        <li><a href="{{route('admin.admins.create')}}">添加管理员</a></li>
                    </ul>
                </li>
            @endif
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->