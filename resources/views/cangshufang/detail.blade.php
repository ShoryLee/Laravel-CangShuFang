@extends('common.layouts')
@section('title')
    书籍详情
@stop

@section('style')
    <style type="text/css">
        .one-book {
            padding: 2% 0;
        }
        .book-img {
            margin: 1% 0;
        }
        .book-detail {
            font-size: 95%;
            line-height: 1.7;
            display: block;
        }
        .book-detail ul{
            list-style-type: none;
        }
        .book-detail ul li span {
            color: #555;
            padding-right: 3%;
        }
        .cate-tags, .author-intro, .description {
            margin-top: 2%;
            margin-bottom: 2%;
        }
        .cate-tags {
            padding: 1%;
        }
        .to-left {
            margin-left: -3%;
        }
        h4 span {
            color: #555;
            padding-right: 2%;
        }
        .author-intro div p,.description div p {
            text-indent: 2em;
        }
    </style>
@stop

@section('content')
    <div class="container ">
        <div class="row border-out one-book">
            <div class="col-md-4 col-sm-8 col-xs-8 text-right book-img">
                <img src="{{ asset('static/images/bookCover/'.$bookDetail->isbn.'.jpg') }}" alt="{{ $bookDetail->title }}" width="240" height="330">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 book-detail">
                <ul>
                    <li><span>书名:</span>
                        <a href="{{ $bookDetail->url }}" target="_blank">
                            <span id="bookTitle">{{ $bookDetail->title }}</span>
                            <span class="label label-default" style="color:#fff;font-weight:normal;cursor:pointer;">
                                在豆瓣查看
                            </span>
                        </a>
                    </li>
                    <li><span>副标题:</span>{{ $bookDetail->sub_title == '' ? '无' : $bookDetail->sub_title }}</li>
                    <li><span>原作名:</span>{{ $bookDetail->original_title == '' ? '无' : $bookDetail->original_title }}</li>
                    <li><span>作者:</span>
                        <a href="{{ url('search/'.$bookDetail->author) }}" target="_blank">{{ $bookDetail->author }}</a>
                    </li>
                    <li><span>译者:</span>
                        <a href="{{ url('search/'.$bookDetail->translator) }}" target="_blank">
                            {{ $bookDetail->translator == '' ? '无' : $bookDetail->translator }}
                        </a>
                    </li>
                    <li><span>页数:</span>{{ $bookDetail->pages }}</li>
                    <li><span>价格:</span>{{ $bookDetail->price }}</li>
                    <li><span>豆瓣分:</span>{{ $bookDetail->rating }}</li>
                    <li><span>ISBN:</span><span id="bookIsbn">{{ $bookDetail->isbn == '' ? '无' : $bookDetail->isbn }}</span></li>
                    <li><span>丛书:</span>{{ $bookDetail->serials }}</li>
                    <li><span>出版社:</span>
                        <a href="{{ url('search/'.$bookDetail->publisher) }}" target="_blank">{{ $bookDetail->publisher }}</a>
                    </li>
                    <li><span>出版年:</span>{{ $bookDetail->pub_date }}</li>
                    <li><span>存入年:</span>{{ $bookDetail->created_at }}</li>
                    <li><span>状态:</span>{{ $bookDetail->mark($bookDetail->mark) }}</li>
                </ul>
            </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-8 text-center" style="background-color: #B0B0B0">
                            <h4>藏书房评分</h4>
                            <span>{{ $starRating }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-8 text-center" style="background-color: #D7D7D7;margin-bottom: 5%;">
                            <h4>对本书评价</h4>
                            @include('common.rating')
                        </div>
                    </div>
                    {{--网购地址--}}
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-8 text-center">
                            <a href="http://search.dangdang.com/?key={{ $bookDetail->title }}" target="_blank">
                                <h4><span class="glyphicon glyphicon-hand-right"></span> 当当网购买</h4>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-8 text-center">
                            <a href="https://search.jd.com/Search?keyword={{ $bookDetail->title }}&enc=utf-8" target="_blank">
                                <h4><span class="glyphicon glyphicon-hand-right"></span> 京东网购买</h4>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-8 text-center">
                            <a href="https://www.amazon.cn/s/ref=nb_sb_noss?__mk_zh_CN=亚马逊网站&url=search-alias%3Daps&field-keywords={{ $bookDetail->title }}" target="_blank">
                                <h4><span class="glyphicon glyphicon-hand-right"></span> 亚马逊购买</h4>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row border-out cate-tags">
            <div class="row">
                <div class="col-md-1">
                    <h4>分类:</h4>
                </div>
                <div class="col-md-11">
                    <h4 class="to-left"><a href="{{ url('category/'.$bookDetail->category) }}">{{ $bookDetail->category }}</a></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <h4>标签:</h4>
                </div>
                <div class="col-md-11">
                    <h4 class="to-left"><span>{{ $bookDetail->tags }}</span></h4>
                </div>
            </div>
        </div>
        <div class="row border-out author-intro">
            <div class="col-md-12">
                <h4>作者介绍</h4>
                <p>
                    {{ $bookDetail->author_intro }}
                </p>
            </div>
        </div>
        <div class="row border-out description">
            <div class="col-md-12">
                <h4>内容介绍</h4>
                <p>
                    {{ $bookDetail->description }}
                </p>
            </div>
        </div>
    </div>

@include('common.comment')

@stop