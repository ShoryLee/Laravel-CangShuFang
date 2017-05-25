@extends('common.layouts')

@section('title')
    书籍分类
@stop
@section('style')
    <style type="text/css">
        .category-title {
            padding: 1%;
        }
        .category-title span{
            font-size: 80%;
            margin-left: 1%;
        }
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
    <div class="container border-out">
        <div class="row">
            <div class="col-md-12 category-title">
                <h3 class="">{{ $categoryName }}<span class="">({{ $counts }})</span></h3>
            </div>
        </div>
        <div class="row">
            @foreach($category as $book)
            <div class="col-md-2 text-left category-book">
                <span><a href="{{ url('category/'.$categoryName.'/'.$book->isbn) }}">{{ $book->title }}</a></span>
            </div>
            @endforeach
        </div>
    </div>
@stop