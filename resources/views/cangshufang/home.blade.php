@extends('common.layouts')
@section('title')
    首页
@stop

@section('style')
    <style type="text/css">
        .book-box {
            width: 200px;
            position: relative;
            margin: 1%;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,0.1);
        }
        @media screen and (-webkit-min-device-pixel-ratio:0){
            .book-box img {
                margin-left: -15px;
            }
            .book-info p {
                margin-top: 7%;
            }
        }
        @-moz-document url-prefix() {
            .book-box {
                float: left;
            }
            .book-info {
                padding-top: 7%;
                margin-left: 7.5%;
            }
            .book-info h4 {
                margin-top: -2%;
            }
            .book-info h4,p {
                padding-left: 3%;
            }
        }
        .book-info {
            background-color: #fff;
            width: 200px;
            height: 60px;
            font-size: 75%;
            line-height: 1.1;
            overflow: hidden;
            position: absolute;
            bottom: 0;
            opacity: 0.95;
            transition: height 0.5s;
            -moz-transition: height 0.5s;
            -webkit-transition: height 0.5s;
            -o-transition: height 0.5s;
        }
        .book-info:hover {
            height: 190px;
        }
        .book-info h4 {
            font-weight: bold;
        }
    </style>
@stop
@section('content')
    <div class="container">
        {{--<hr>--}}
        <div class="row" style="padding-left: 3%;margin-top:1%;">
            @foreach($books as $book)
            <div class="book-box col-md-3 col-xs-6">
                <img src="{{ asset('static/images/bookCover/'.$book->isbn.'.jpg') }}" width="200" height="250">
                <div class="row">
                    <a href="{{ url('detail/'.$book->isbn) }}" target="_self">
                        <div class="book-info col-md-3">
                            <h4>{{ $book->title }}</h4>
                            <p>作者:<span>{{ $book->author }}</span></p>
                            <p>译者:<span>{{ $book->translator == '' ? '无' : $book->translator }}</span></p>
                            <p>出版社:<span>{{ $book->publisher }}</span></p>
                            <p>页数:<span>{{ $book->pages }}</span></p>
                            <p>出版年:<span>{{ $book->pub_date }}</span></p>
                            <p>定价:<span>{{ $book->price }}</span></p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@stop
