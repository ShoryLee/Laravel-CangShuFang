@extends('common.layouts')

@section('title')
    搜索结果
@stop

@section('style')
    <style>
        .search-title {
            border-bottom: 1px solid #DDDDDD;
        }
    </style>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>搜索结果 <small>[ ' {{ $bookInfo }} ' ]</small></h3>
                <hr>
            </div>
        </div>
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-3">
                    <h4><a href="{{ url('/detail/'.$book->isbn) }}">
                            {{ $book->title }}
                        </a>
                    </h4>
                </div>
            @endforeach
        </div>
        <hr>
    </div>
@stop