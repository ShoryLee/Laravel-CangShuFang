@extends('admin.adminLayouts');

@section('title')
    编辑评论
@stop

@section('style')
    <style>
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
                    <h4>前方的路并不平坦，曲折艰难是生活的必经。</h4>
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
                        {{ Request::getPathInfo() == '/admin/manageComment/editComment' ? 'active' : '' }}
                            ">评论管理</a>
                </div>
            </div>
            {{--右侧-编辑评论--}}
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4><strong>编辑评论</strong></h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <input type="hidden" name="id" id="commentId" value="{{ $getEditComment->id }}">
                                    <label for="title" class="control-label sr-only">书名: </label>
                                    <div class="input-group-addon">书名</div>
                                    <input type="text" name="title" class="form-control" placeholder="书名" id="title"
                                        value="{{ $getEditComment->title }}"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="commentBy" class="control-label sr-only">评论人: </label>
                                    <div class="input-group-addon">评论人</div>
                                    <input type="text" name="commentBy" class="form-control" placeholder="评论人"
                                           id="commentBy" value="{{ $getEditComment->comment_by }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="commentTime" class="control-label sr-only">评论时间: </label>
                                    <div class="input-group-addon">评论时间</div>
                                    <input type="text" name="commentTime" class="form-control" placeholder="评论时间"
                                           id="commentTime" disabled="disabled" value="{{ $getEditComment->updated_at }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="commentContent">
                                    <div class="input-group-addon">评论内容</div>
                                    <textarea class="form-control" rows="5" placeholder="评论内容" name="commentContent"
                                              id="commentContent">{{ $getEditComment->content }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-default" id="click-to-editComment">
                                    提交
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop