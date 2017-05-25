@extends('common.layouts')

@section('title')
    管理书籍
@stop

@section('style')
    <style type="text/css">
        .jumbotron h4:first-letter {
            font-size: 150%;
        }
        .comment-edit:hover {
            color: #FF7F27;
        }
        .click-to-delete:hover {
            color: #ED1C1C;
            cursor: pointer;
        }
    </style>
@stop

@section('content')
    <div class="container">
        {{--header区域--}}
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h4>每一句你的说过话，都是我们前行的明灯。</h4>
                </div>
            </div>
        </div>
        {{--正文--}}
        <div class="row">
            {{--左侧菜单区域--}}
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ url('admin/management') }}" class="list-group-item">管理首页</a>
                    <a href="{{ url('admin/addBook') }}" class="list-group-item">添加书籍</a>
                    <a href="{{ url('admin/manageBook') }}" class="list-group-item">书籍管理</a>
                    <a href="{{ url('admin/manageComment') }}" class="list-group-item
                        {{ Request::getPathInfo() == '/admin/manageComment' ? 'active' : '' }}
                            ">评论管理</a>
                </div>
            </div>
            {{--右侧-总览所有评论--}}
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4><strong>评论管理</strong></h4>
                    </div>
                    <div class="panel-body">
                        <h4>共 {{ $count }} 条评论</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="text-center">书名</th>
                                        <th class="text-center">评论内容</th>
                                        <th class="text-center">评论人</th>
                                        <th class="text-center">评论时间</th>
                                        <th class="text-center" colspan="2">管理</th>
                                    </tr>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td><a href="{{ url('detail/'.$comment->isbn) }}">{{ $comment->title }}</a></td>
                                            <td>
                                                @if(strlen($comment->content) >= 30)
                                                    {{ mb_substr($comment->content, 0, 15).'...' }}
                                                @else
                                                    {{ $comment->content }}
                                                @endif
                                            </td>
                                            <td>{{ $comment->comment_by }}</td>
                                            <td>{{ $comment->updated_at }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('admin/manageComment/editComment?id='.$comment->id) }}" class="comment-edit">
                                                    编辑
                                                </a>
                                            </td>
                                            <td class="text-center click-to-delete">
                                                <span class="sr-only toDelete">
                                                    {{ url('admin/manageComment/deleteComment?id='.$comment->id) }}
                                                </span>
                                                <span>删除</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            {{--显示页码--}}
                            <div class="text-center">
                                {{ $comments->render() }}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop