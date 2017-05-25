@extends('common.layouts')

@section('title')
    关于我们
@stop

@section('style')
    <style type="text/css">
        .saySomething {
            text-indent: 2em;
            line-height: 2;
        }

    </style>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h3>藏书房<small> ——我们分享藏书的地方。</small></h3>
                </div>
                <article class="saySomething">
                    <h4><strong>藏书房严重依赖豆瓣网提供的书籍信息。</strong></h4>
                    <p>
                        类似于<a href="https://www.douban.com"><u>豆瓣读书</u></a>。网站曲曲折折经历了好几年的更迭、停止、废弃与改版。
                        但是所幸，始终还是坚持下来了。那是与zZ一起的想法；那时候还想过做一个搜集大家梦想的网站
                        <strong>DreamCollect</strong>，让朋友们彼此共享、交流那些藏在心里深处可能被现实所“抛弃”的大大小小的梦想。
                        却始终没能完成上线过。后来就萌生了做<strong>藏书房</strong>，上线过。那时候纯手工代码，没有利用任何框架。
                        其实现在想来也是正确的，那是学习过程中打牢基础只是的必须历程。不久因为种种因素放弃维护直到域名失效。
                        后来因为诗句<strong>“苦恨年年压金线，为他人作嫁衣裳!”</strong>更换了新的域名<strong>金线阁</strong>。
                        也上线，大概也是同样的原因下线了。直到最近，才又利用各种框架和库重构藏书房网站。也算是学习的过程。
                    </p>
                    <p>
                        从一开始的想法，到写代码，上线，其中的艰辛不可胜数。因为是一路都是自学，边学边用，其中的挫败和小成就也是数不清的。
                        过程很慢，全都因为懒。体验不好，大概因为技术和审美不够。
                    </p>
                    {{--<img src="{{ url('/Admin/authCode') }}" alt="验证码" onclick="this.src='{{ url('/Admin/authCode') }}'">--}}
                </article>
            </div>
        </div>
        <div class="row">

        </div>
    </div>
@stop