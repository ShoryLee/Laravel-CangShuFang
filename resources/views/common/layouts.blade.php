<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | 藏书房</title>
    {{--引入外部CSS--}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('static/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/common.css') }}">
    {{--自定义CSS区域--}}
    @section('style')
    @show
</head>
<body>
{{--定义导航栏--}}
<nav class="navbar navbar-default navbar-static-top nav-index" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" id="logo" href="{{ url('') }}"></a>
        </div>
        {{--导航栏菜单--}}
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav">
                {{--<li class=""><a href="{{ url('') }}">首页</a></li>--}}
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        时光
                        <span class="caret"></span>
                    </a>
                    {{--分类下的下拉菜单--}}
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('catalog') }}">目录</a></li>
                        <li><a href="{{ url('dynamic') }}">动态</a></li>
                        <li><a href="{{ url('blog') }}">博客</a></li>
                        <li><a href="{{ url('about') }}">我们</a></li>
                    </ul>
                </li>
                <li class=""><a href="{{ url('category/诗词') }}">诗词</a></li>
                <li class=""><a href="{{ url('category/哲学') }}">哲学</a></li>
                <li class=""><a href="{{ url('category/散文') }}">散文</a></li>
                <li class=""><a href="{{ url('category/小说') }}">小说</a></li>
                <li class=""><a href="{{ url('category/童话') }}">童话</a></li>
                <li class=""><a href="{{ url('category/社科') }}">社科</a></li>
                <li class=""><a href="{{ url('category/传记') }}">传记</a></li>
                <li class=""><a href="{{ url('category/历史') }}">历史</a></li>
                <li class=""><a href="{{ url('category/古典') }}">古典</a></li>
                <li class=""><a href="{{ url('category/戏剧') }}">戏剧</a></li>
                <li class=""><a href="{{ url('category/推理') }}">推理</a></li>
                <li class=""><a href="{{ url('category/其他') }}">其他</a></li>
            </ul>
            <div class="navbar-form navbar-left" role="search">
                <div class="form-group searchInput">
                    <input type="text" class="form-control inputValue" placeholder="书名、作者、出版社">
                </div>
                <button type="submit" class="btn btn-default" id="search">搜索</button>
                <div id="search-suggest">
                    <a href="#" id="to-book"></a>
                </div>
            </div>
            <ul class="nav navbar-nav log-reg">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">登录</a></li>
                    <li><a href="{{ url('/register') }}">注册</a></li>
                @else
                    <a href="{{ url('') }}">
                        <img src="{{ asset('static/images/avatar/'.Auth::user()->thumb.'.png') }}" id="thumb">
                        <span class="sr-only" id="userThumb">{{ Auth::user()->thumb }}</span>
                    </a>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>退出</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@section('content')
@show

{{--底部版权及其他--}}
<div class="container-fluid" style="margin-top:1%;">
    <div class="row">
        <div class="col-md-10 text-center copy-text">
            {{-- 版权 --}}
            <a href="{{ url('') }}">
                <span>&copy 藏书房 {{ date('Y') }}</span>
            </a>
            {{-- GitHub --}}
            <a href="https://github.com/ShoryLee" target="_blank"
               data-toggle="tooltip" data-placement="top" title="ShoryLee's gitHub">
                <span class="fa fa-github icons" aria-hidden="true"></span>
            </a>
            {{-- instagram --}}
            <a href="https://www.instagram.com/shorylee" target="_blank"
               data-toggle="tooltip" data-placement="top" title="shorylee's instagram">
                <span class="fa fa-instagram icons" aria-hidden="true"></span>
            </a>
            {{-- 微信 --}}
            <a href="https://weixin.qq.com" target="_blank" id="WeChat"
               data-toggle="tooltip" data-placement="top" title="cangshufang">
                <span class="fa fa-weixin icons" aria-hidden="true"></span>
            </a>
        </div>
        <div class="col-md-1">
                <span class="fa fa-arrow-circle-up fa-2x" aria-hidden="true" id="toTop"
                      data-toggle="tooltip" data-placement="top" title="返回顶部">
                </span>
        </div>
    </div>
</div>
{{--引入外部javascript--}}
<script type="text/javascript" src="{{ asset('static/js/jquery-3.1.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/js/sweetalert2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/js/es6-promise.auto.min.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('static/js/holder.min.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('static/js/common.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/js/checkForm.js') }}"></script>
</body>
</html>