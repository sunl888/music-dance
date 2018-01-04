<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="@section('keywords')@show">
    <title>@section('title')音乐与舞蹈学院精品课程 @show</title>
    <meta name="description" content="@section('description')@show">
    <link rel="stylesheet" type="text/css" href="{{ cdn('music/style/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ cdn('music/style/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ cdn('music/style/bootstrap.min.css') }}">
</head>
<body>
@yield('content')
<script type="text/javascript" src="{{cdn('music/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{cdn('music/js/index.js')}}"></script>
@yield('js')
@stack('js')
</body>
</html>