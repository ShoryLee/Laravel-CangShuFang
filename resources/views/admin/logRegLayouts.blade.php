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
    {{--<link rel="stylesheet" href="{{ asset('static/css/sweetalert2.min.css') }}">--}}
    {{--<link rel="stylesheet" href="{{ asset('static/css/common.css') }}">--}}
    {{--自定义CSS区域--}}
    @section('style')
    @show
</head>
<body>

@section('content')
@show

{{--引入外部javascript--}}
<script type="text/javascript" src="{{ asset('static/js/jquery-3.1.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/js/checkForm.js') }}"></script>
</body>
</html>