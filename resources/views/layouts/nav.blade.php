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
                @if(Auth::check())
                    <ul class="nav navbar-nav main-navbar">

                        <li @if(Request::segment(1) == 'dashboard') class="active" @endif><a
                                    href="{{ route('dashboard.index') }}">@lang('common.dashboard')</a>
                        </li>
                        <li @if(Request::segment(1) == 'metadata') class="active" @endif><a
                                    href="{{ route('meta.index') }}">@lang('common.metadata')</a></li>
                        <li @if(Request::segment(1) == 'dataset') class="active" @endif><a
                                    href="{{ route('dataset.index') }}">@lang('common.dataset')</a></li>

                    </ul>
                @endif
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                        <li>
                            <a href="javascript:;" class="userpic">
                                <img src="/img/user_head.png" alt="{{ Auth::user()->user_name }}">
                                <span class="username">{{ Auth::user()->user_name }}</span>
                            </a>
                        </li>
                        <li><a href="javascript:;"><span class="icon icon-help"></span></a>
                        </li>
                        <li><a href="{{ url('/auth/logout') }}" title="@lang('auth.logout')"><span
                                        class="icon icon-exit"></span></a>
                        </li>
                    @else
                        <li><a href="{{url('/auth/login')}}">@lang('auth.login')</a></li>
                        <li><a href="{{url('/auth/register')}}">@lang('auth.register')</a></li>
                    @endif
                </ul>

            </div>
        </div>
    </nav>
</header>