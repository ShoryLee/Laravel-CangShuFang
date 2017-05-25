@extends('admin.adminLayouts')

@section('title')
    添加书籍
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
                    <h4>多一个孩子就多一盏生活的明灯。</h4>
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
            {{--右侧-添加书籍--}}
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4><strong>添加一本书</strong></h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <h4>输入13位ISBN即可</h4>
                                <div class="input-group">
                                    <label for="add-book" class="control-label sr-only">ISBN: </label>
                                    <div class="input-group-addon">ISBN</div>
                                    <input type="text" name="isbn" class="form-control" placeholder="输入 ISBN" id="isbn">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <h3>或手动添加</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="title" class="control-label sr-only">书名: </label>
                                    <div class="input-group-addon">书名</div>
                                    <input type="text" name="title" class="form-control" placeholder="书名" id="title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="sub-title" class="control-label sr-only">副题: </label>
                                    <div class="input-group-addon">副题</div>
                                    <input type="text" name="sub-title" class="form-control" placeholder="副题"
                                           id="sub-title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="original-title" class="control-label sr-only">原作: </label>
                                    <div class="input-group-addon">原作</div>
                                    <input type="text" name="original-title" class="form-control" placeholder="原作"
                                           id="original-title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="author" class="control-label sr-only">作者: </label>
                                    <div class="input-group-addon">作者</div>
                                    <input type="text" name="author" class="form-control" placeholder="作者" id="author">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="translator" class="control-label sr-only">译者: </label>
                                    <div class="input-group-addon">译者</div>
                                    <input type="text" name="translator" class="form-control" placeholder="译者"
                                           id="translator">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="pages" class="control-label sr-only">页数: </label>
                                    <div class="input-group-addon">页数</div>
                                    <input type="text" name="pages" class="form-control" placeholder="页数" id="pages">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="price" class="control-label sr-only">价格: </label>
                                    <div class="input-group-addon">价格</div>
                                    <input type="text" name="price" class="form-control" placeholder="价格" id="price">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="rating" class="control-label sr-only">评分: </label>
                                    <div class="input-group-addon">评分</div>
                                    <input type="text" name="rating" class="form-control" placeholder="评分" id="rating">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="category" class="control-label sr-only">分类: </label>
                                    <div class="input-group-addon">分类</div>
                                    <select class="form-control" name="bookCategory" id="bookCategory">
                                        <option value="诗词">诗词</option>
                                        <option value="哲学">哲学</option>
                                        <option value="散文">散文</option>
                                        <option value="小说" selected>小说</option>
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
                                    <input type="text" name="tags" class="form-control" placeholder="标签" id="tags">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="serials" class="control-label sr-only">丛书: </label>
                                    <div class="input-group-addon">丛书</div>
                                    <input type="text" name="serials" class="form-control" placeholder="丛书"
                                           id="serials">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="img" class="control-label sr-only">封面: </label>
                                    <div class="input-group-addon">封面</div>
                                    <input type="text" name="img" class="form-control" placeholder="封面" id="img">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="isbn-now" class="control-label sr-only">ISBN: </label>
                                    <div class="input-group-addon">ISBN</div>
                                    <input type="text" name="isbn" class="form-control" placeholder="ISBN"
                                           id="isbn-now">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="publisher" class="control-label sr-only">出版社: </label>
                                    <div class="input-group-addon">出版社</div>
                                    <input type="text" name="publisher" class="form-control" placeholder="出版社"
                                           id="publisher">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="pub-date" class="control-label sr-only">出版年: </label>
                                    <div class="input-group-addon">出版年</div>
                                    <input type="text" name="pub-date" class="form-control" placeholder="出版年"
                                           id="pub-date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="url" class="control-label sr-only">豆瓣链接: </label>
                                    <div class="input-group-addon">豆瓣链接</div>
                                    <input type="text" name="url" class="form-control" placeholder="豆瓣链接" id="url">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">作者简介</div>
                                    <textarea class="form-control" rows="3" placeholder="作者简介"
                                              id="author-intro"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">书籍简介</div>
                                    <textarea class="form-control" rows="3" placeholder="书籍简介" id="summary"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-default" id="click-to-addBook">
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