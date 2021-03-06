<!-- begin #header -->
<div id="header" class="header navbar navbar-default">
    <!-- begin container-fluid -->
    <div class="container-fluid">

        <a href="{{url('/admin/')}}" class="navbar-brand">
                <span class="navbar-logo">

                </span>
            {{option('site_name')}}
        </a>
        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- end mobile sidebar expand / collapse button -->

        <!-- begin header navigation right -->
        <ul class="nav navbar-nav navbar-right">
            @if(admin())
                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{admin()->avatar}}" alt=""/>
                        <span class="hidden-xs">{{admin()->admin_name}}</span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInLeft">
                        <li class="arrow"></li>
                        <li>
                            <a href="{{route('admin.admins.edit',array('admin_id' => admin()->admin_id))}}">个人信息</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{url('admin/auth/logout')}}">退出登录</a></li>
                    </ul>
                </li>
            @endif
        </ul>
        <!-- end header navigation right -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end #header -->