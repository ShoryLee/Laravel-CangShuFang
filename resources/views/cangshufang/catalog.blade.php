@extends('common.layouts')

@section('title')
    书籍目录
@stop
@section('style')
    <style type="text/css">
        .category-book {
            padding: 1%;
        }
        .category-book span a {
            color: #666 !important;
        }
        .category-book span a:hover {
            color: #000 !important;
        }
    </style>
@stop

@section('content')
    <div class="container">
        {{--header区域--}}
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h3>所有书籍({{ $count }})</h3>
                </div>
            </div>
        </div>
        {{--正文区域--}}
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-2 text-left category-book">
                    <span><a href="{{ url('detail/'.$book->isbn) }}">{{ $book->title }}</a></span>
                </div>
            @endforeach
        </div>
    </div>
@stop