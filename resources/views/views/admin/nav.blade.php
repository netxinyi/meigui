<header>
    <nav class="navbar navbar-inverse navbar-fixed-top" id="main-header">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar-collapse">
                    <span class="sr-only">导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/dashboard">
                    <img src="/img/logo.png" alt="">
                    <span class="main-navbar-title">{{Config::get('site.site-name')}}</span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar-collapse">

                <ul class="nav navbar-nav main-navbar">


                </ul>

                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a href="javascript:;" class="userpic">
                            <img src="/img/user_head.png" alt="">
                            <span class="username"></span>
                        </a>
                    </li>
                    <li><a href="javascript:;"><span class="icon icon-help"></span></a>
                    </li>
                    <li><a href="{{ url('/auth/logout') }}" title="退出"><span class="icon icon-exit"></span></a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
</header>