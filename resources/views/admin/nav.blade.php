<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="/assets/admin/img/user-13.jpg" alt=""/></a>
                </div>
                <div class="info">
                    @if(Auth::check())
                    {{Auth::user()->admin_name}}
                    <small>{{Auth::user()->email}}</small>
                    @endif
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
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
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-cogs"></i>
                    <span>网站设置</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{url('admin/option')}}">基本设置</a></li>
                    <li><a href="{{url('admin/option/add')}}">添加设置项</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-user"></i>
                    <span>会员管理</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="">会员列表</a></li>
                    <li><a href="">高级搜索</a></li>
                    <li><a href="">添加会员</a></li>
                </ul>
            </li>
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->