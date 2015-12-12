<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta content="战狼技术团队" name="author"/>
    @yield('meta')
    <title>
        @yield('title',option('site_name'))
    </title>
    <link rel="shortcut icon" href="/favicon.ico">
    @yield('first-css')
    @yield('global-css')
    @yield('last-css')
    @yield('header-first-js')
    @yield('header-global-js')
    @yield('header-last-js')
    @yield('header')
</head>

<body @yield('body-attr') class="@yield('body-class')">
@yield('head')
@yield('body')
@yield('foot')

@yield('footer-first-js')
@yield('footer-global-js')
@yield('footer-last-js')
</body>
</html>