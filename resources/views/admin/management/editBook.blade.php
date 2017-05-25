@extends('admin.adminLayouts')

@section('title')
    编辑书籍
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
                    <h4>没有矫正过的生命，必不正直。</h4>
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
                        {{ Request::getPathInfo() == '/admin/manageBook/editBook' ? 'active' : '' }}
                            ">书籍管理</a>
                    <a href="{{ url('admin/manageComment') }}" class="list-group-item">评论管理</a>
                </div>
            </div>
            {{--右侧-添加书籍--}}
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4><strong>编辑书籍</strong></h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <input type="hidden" name="id" id="bookId" value="{{ $getEditBook ->id }}">
                                    <label for="title" class="control-label sr-only">书名: </label>
                                    <div class="input-group-addon">书名</div>
                                    <input type="text" name="title" class="form-control editInfo"
                                           value="{{ $getEditBook ->title }}" id="title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="sub-title" class="control-label sr-only">副题: </label>
                                    <div class="input-group-addon">副题</div>
                                    <input type="text" name="subtitle" class="form-control editInfo"
                                           value="{{ $getEditBook ->sub_title == '' ? '无' : $getEditBook ->sub_title }}" id="sub-title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="original-title" class="control-label sr-only">原作: </label>
                                    <div class="input-group-addon">原作</div>
                                    <input type="text" name="original_title" class="form-control editInfo"
                                           value="{{ $getEditBook ->original_title == '' ? '无' : $getEditBook ->original_title }}" id="original-title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="author" class="control-label sr-only">作者: </label>
                                    <div class="input-group-addon">作者</div>
                                    <input type="text" name="author" class="form-control editInfo"
                                           value="{{ $getEditBook ->author }}" id="author">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="translator" class="control-label sr-only">译者: </label>
                                    <div class="input-group-addon">译者</div>
                                    <input type="text" name="translator" class="form-control editInfo"
                                           value="{{ $getEditBook ->translator == '' ? '无' : $getEditBook ->translator }}" id="translator">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="pages" class="control-label sr-only">页数: </label>
                                    <div class="input-group-addon">页数</div>
                                    <input type="text" name="pages" class="form-control editInfo"
                                           value="{{ $getEditBook ->pages }}" id="pages">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="price" class="control-label sr-only">价格: </label>
                                    <div class="input-group-addon">价格</div>
                                    <input type="text" name="price" class="form-control editInfo"
                                           value="{{ $getEditBook ->price }}" id="price">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="rating" class="control-label sr-only">评分: </label>
                                    <div class="input-group-addon">评分</div>
                                    <input type="text" name="rating" class="form-control editInfo"
                                           value="{{ $getEditBook ->rating }}" id="rating">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="category" class="control-label sr-only">分类: </label>
                                    <div class="input-group-addon">分类</div>
                                    <span class="sr-only" id="old-category">{{ $getEditBook ->category }}</span>
                                    <select class="form-control" name="bookCategory" id="bookCategory">
                                        <option value="诗词">诗词</option>
                                        <option value="哲学">哲学</option>
                                        <option value="散文">散文</option>
                                        <option value="小说">小说</option>
                                        <option value="童话">童话</option>
                                        <option value="社科">社科</option>
                                        <option value="传记">传记</option>
                                        <option value="历史">历史</option>
                                        <option value="古典">古典</option>
                                        <option value="戏剧">戏剧</option>
                                        <option value="推理">推理</option>
                                        <option value="其他">其他</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="tags" class="control-label sr-only">标签: </label>
                                    <div class="input-group-addon">标签</div>
                                    <input type="text" name="tags" class="form-control editInfo"
                                           value="{{ $getEditBook ->tags }}" id="tags">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="serials" class="control-label sr-only">丛书: </label>
                                    <div class="input-group-addon">丛书</div>
                                    <input type="text" name="serials" class="form-control editInfo"
                                           value="{{ $getEditBook ->serials }}" id="serials">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="img" class="control-label sr-only">封面: </label>
                                    <div class="input-group-addon">封面</div>
                                    <input type="text" name="img" class="form-control editInfo"
                                           value="{{ $getEditBook ->img }}" id="img">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="mark" class="control-label sr-only">状态: </label>
                                    <div class="input-group-addon">状态</div>
                                    {{--<input type="text" name="mark" class="form-control editInfo"--}}
                                           {{--value="{{ $getEditBook ->mark($getEditBook ->mark) }}" id="mark">--}}
                                    <span class="sr-only" id="old-mark">{{ $getEditBook ->mark($getEditBook ->mark) }}</span>
                                    <select class="form-control" name="bookMark" id="bookMark">
                                        <option value="1"  selected="selected">在库</option>
                                        <option value="2">送出</option>
                                        <option value="3">借出</option>
                                        <option value="4">丢失</option>
                                        <option value="5">损坏</option>
                                        <option value="6">未知</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="isbn-now" class="control-label sr-only">ISBN: </label>
                                    <div class="input-group-addon">ISBN</div>
                                    <input type="text" name="isbn" class="form-control editInfo"
                                           value="{{ $getEditBook ->isbn == '' ? '无' : $getEditBook ->isbn }}" id="isbn-now">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="publisher" class="control-label sr-only">出版社: </label>
                                    <div class="input-group-addon">出版社</div>
                                    <input type="text" name="publisher" class="form-control editInfo"
                                           value="{{ $getEditBook ->publisher }}" id="publisher">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="pub-date" class="control-label sr-only">出版年: </label>
                                    <div class="input-group-addon">出版年</div>
                                    <input type="text" name="pub_date" class="form-control editInfo"
                                           value="{{ $getEditBook ->pub_date }}" id="pub-date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="url" class="control-label sr-only">豆瓣链接: </label>
                                    <div class="input-group-addon">豆瓣链接</div>
                                    <input type="text" name="url" class="form-control editInfo"
                                           value="{{ $getEditBook ->url }}" id="url">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">作者简介</div>
                                    <textarea class="form-control editInfo" name="author_intro" rows="3" placeholder="作者介绍" id="author-intro">
                                        {{ $getEditBook ->author_intro }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">书籍简介</div>
                                    <textarea class="form-control editInfo" name="description" rows="3" placeholder="书籍简介" id="summary">
                                        {{ $getEditBook ->description }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        {{--@endforeach--}}
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-default" id="click-to-editBook">
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