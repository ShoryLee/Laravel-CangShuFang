@extends('admin.adminLayouts')

@section('title')
    管理书籍
@stop

@section('style')
    <style type="text/css">
        .jumbotron h4:first-letter {
            font-size: 170%;
        }
        .manage-edit:hover {
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
                    <h4>你有多少书，就会有多少需要照顾的孩子。</h4>
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
                    <a href="{{ url('admin/manageBook') }}" class="list-group-item
                        {{ Request::getPathInfo() == '/admin/manageBook' ? 'active' : '' }}
                            ">书籍管理</a>
                    <a href="{{ url('admin/manageComment') }}" class="list-group-item">评论管理</a>
                </div>
            </div>
            {{--右侧-总览所有书籍--}}
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4><strong>书籍管理</strong></h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="text-center">书名</th>
                                    <th class="text-center">作者</th>
                                    <th colspan="2" class="text-center">管理</th>
                                </tr>
                                @foreach($books as $book)
                                <tr>
                                    <td><a href="{{ url('detail/'.$book->isbn) }}">{{ $book->title }}</a></td>
                                    <td><a href="#">{{ $book->author }}</a></td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/manageBook/editBook?id='.$book->id) }}" class="manage-edit">
                                            编辑
                                        </a>
                                    </td>
                                    <td class="text-center click-to-delete">
                                        <span class="sr-only toDelete">
                                            {{ url('admin/manageBook/deleteBook?id='.$book->id.'&isbn='.$book->isbn) }}
                                        </span>
                                        <span>删除</span>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        {{--显示页码--}}
                        <div class="text-center">
                            {{ $books->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop