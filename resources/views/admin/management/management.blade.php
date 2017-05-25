@extends('admin.adminLayouts')

@section('title')
    后台管理
@stop

@section('style')
    <style type="text/css">
        .jumbotron h4:first-letter {
            font-size: 150%;
        }
    </style>
@stop

@section('content')
    <div class="container">
        {{--header区域--}}
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h4>有后台，并不意味着能力是肆无忌惮的。</h4>
                </div>
            </div>
        </div>
        {{--正文--}}
        <div class="row">
            {{--左侧菜单区域--}}
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ url('admin/management') }}" class="list-group-item
                        {{ Request::getPathInfo() == '/admin/management' ? 'active' : '' }}
                            ">管理首页</a>
                    <a href="{{ url('admin/addBook') }}" class="list-group-item
                        {{ Request::getPathInfo() == '/admin/addBook' ? 'active' : '' }}
                    ">添加书籍</a>
                    <a href="{{ url('admin/manageBook') }}" class="list-group-item
                        {{ Request::getPathInfo() == '/admin/manageBook' ? 'active' : '' }}
                    ">书籍管理</a>
                    <a href="{{ url('admin/manageComment') }}" class="list-group-item
                        {{ Request::getPathInfo() == '/admin/manageComment' ? 'active' : '' }}
                    ">评论管理</a>
                </div>
            </div>
            {{--右侧-总览--}}
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4><strong>藏书房总览</strong></h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <td>今日添加</td>
                                <td>{{ $countToday }}</td>
                            </tr>
                            <tr>
                                <td>全部书籍</td>
                                <td>{{ $countAll }}</td>
                            </tr>
                            <tr>
                                <td>小说</td>
                                <td>{{ $countNovel }}</td>
                            </tr>
                            <tr>
                                <td>散文</td>
                                <td>{{ $countProse }}</td>
                            </tr>
                            <tr>
                                <td>诗词</td>
                                <td>{{ $countPoem }}</td>
                            </tr>
                            <tr>
                                <td>哲学</td>
                                <td>{{ $countPhilosophy }}</td>
                            </tr>
                            <tr>
                                <td>童话</td>
                                <td>{{ $countTale }}</td>
                            </tr>
                            <tr>
                                <td>社科</td>
                                <td>{{ $countSocial }}</td>
                            </tr>
                            <tr>
                                <td>传记</td>
                                <td>{{ $countBiography }}</td>
                            </tr>
                            <tr>
                                <td>历史</td>
                                <td>{{ $countHistory }}</td>
                            </tr>
                            <tr>
                                <td>戏剧</td>
                                <td>{{ $countDrama }}</td>
                            </tr>
                            <tr>
                                <td>古典</td>
                                <td>{{ $countClassical }}</td>
                            </tr>
                            <tr>
                                <td>推理</td>
                                <td>{{ $countWhodunit }}</td>
                            </tr>
                            <tr>
                                <td>其他</td>
                                <td>{{ $countOthers }}</td>
                            </tr>
                            <tr>
                                <td>评论</td>
                                <td>{{ $countComment }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop