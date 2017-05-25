@extends('common.layouts')
@section('title')
    首页
@stop

@section('style')
    <style type="text/css">

        .left-padding-index {
            padding-left: 8%;
        }
        .one-book-style {
            margin: 0.5%;
            padding: 0.5%;
        }
        .book-title {
            font-weight: bold;
        }
        .description {
            font-size: 85%;
        }
        .w {
            display:none;
        }
    </style>
@stop
@section('content')

    {{--内容--}}
    <div class="container">
        <hr>
        <div class="row left-padding-index">
            <div class="col-md-2 col-xs-4 one-book-style abc">
                <a href="#" class="thumbnail">
                    <img src="https://img1.doubanio.com/lpic/s29133037.jpg">
                    <h3 class="text-center">任你行</h3>
                </a>
            </div>

            <div class="col-md-2 col-xs-4 one-book-style w">

                <h3 class="text-center book-title">任我行</h3>
                <p>作者：林夕</p>
                <p>出版年: 2016-12</p>
                <p>页数: 222</p>
                <p>定价: 39.50元</p>
                <p class='description'>简介：你究竟了解自己多少，了解自己之后，能不能真正做到自己想做的？</p>
            </div>

            <div class="col-md-2 col-xs-4 one-book-style">
                <a href="#" class="thumbnail">
                    <img src="https://img3.doubanio.com/lpic/s29140941.jpg">
                    <h3 class="text-center">任我行</h3>
                </a>
            </div>
            <div class="col-md-2 col-xs-4 one-book-style">
                <a href="#" class="thumbnail">
                    <img src="https://img3.doubanio.com/lpic/s29113352.jpg">
                    <h3 class="text-center">任你行</h3>
                </a>
            </div>
            <div class="col-md-2 col-xs-4 one-book-style">
                <a href="#" class="thumbnail">
                    <img src="https://img3.doubanio.com/lpic/s29112880.jpg">
                    <h3 class="text-center">任你行</h3>
                </a>
            </div>
            <div class="col-md-2 col-xs-4 one-book-style">
                <a href="#" class="thumbnail">
                    <img src="https://img3.doubanio.com/lpic/s29172712.jpg">
                    <h3 class="text-center">任你行</h3>
                </a>
            </div>
        </div>

        <div class="row left-padding-index">
            <div class="col-md-2 col-xs-4 one-book-style">
                <a href="#" class="thumbnail">
                    <img src="https://img1.doubanio.com/lpic/s29133037.jpg">
                    <h3 class="text-center">任你行</h3>
                </a>
            </div>
            <div class="col-md-2 col-xs-4 one-book-style">
                <a href="#" class="thumbnail">
                    <img src="https://img1.doubanio.com/lpic/s29140979.jpg">
                    <h3 class="text-center">任你行</h3>
                </a>
            </div>
            <div class="col-md-2 col-xs-4 one-book-style">
                <a href="#" class="thumbnail">
                    <img src="https://img3.doubanio.com/lpic/s29119792.jpg" class="img-responsive">
                    <h3 class="text-center">任你行</h3>
                </a>
            </div>
            <div class="col-md-2 col-xs-4 one-book-style">
                <a href="#" class="thumbnail">
                    <img src="https://img1.doubanio.com/lpic/s29133037.jpg">
                    <h3 class="text-center">任你行</h3>
                </a>
            </div>
            <div class="col-md-2 col-xs-4 one-book-style">
                <a href="#" class="thumbnail">
                    <img src="https://img1.doubanio.com/lpic/s29133037.jpg">
                    <h3 class="text-center">任你行</h3>
                </a>
            </div>
        </div>

        <div class="row left-padding-index">
            <div class="col-md-2 col-xs-4 one-book-style">
                <a href="#" class="thumbnail">
                    <img src="https://img1.doubanio.com/lpic/s29133037.jpg">
                    <h3 class="text-center">任你行</h3>
                </a>
            </div>
            <div class="col-md-2 col-xs-4 one-book-style">
                <a href="#" class="thumbnail">
                    <img src="https://img1.doubanio.com/lpic/s29140979.jpg">
                    <h3 class="text-center">任你行</h3>
                </a>
            </div>
            <div class="col-md-2 col-xs-4 one-book-style">
                <a href="#" class="thumbnail">
                    <img src="https://img3.doubanio.com/lpic/s29119792.jpg" class="img-responsive">
                    <h3 class="text-center">任你行</h3>
                </a>
            </div>
            <div class="col-md-2 col-xs-4 one-book-style">
                <a href="#" class="thumbnail">
                    <img src="https://img1.doubanio.com/lpic/s29133037.jpg">
                    <h3 class="text-center">任你行</h3>
                </a>
            </div>
            <div class="col-md-2 col-xs-4 one-book-style">
                <a href="#" class="thumbnail">
                    <img src="https://img1.doubanio.com/lpic/s29133037.jpg">
                    <h3 class="text-center">任你行</h3>
                </a>
            </div>
        </div>

    </div>
@stop