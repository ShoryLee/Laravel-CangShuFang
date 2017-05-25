<style type="text/css">
    .border-line {
        border-bottom: 1px solid #DDD;
        padding-top: 1%;
    }
    .border-line h4 span {
        margin-left: 3%;
    }
    .write-comment {
        padding: 2% 0;
    }
    .clear-fix {
        clear: both;
    }
    .submit {
        left: 45%;
    }
    .comment-count {
        font-size: 120%;
    }
    .comment-show {
        margin: 1% auto;
    }
    .comment-number span {
        font-size: 120%;
        font-style: italic;
    }
    .comment-content {
        border-bottom: 1px solid #E0E0E0;
        padding-top: 5px;
    }
    .avatar {
        border-radius: 50%;
        border: 1px solid #5E5E5E;
    }
    .comment-border {
        color: #777;
    }
</style>


<!-- 发表评论 -->
<!-- 如果用户没有登录，匿名发表则需要显示此处，登录或供访客留下用户名和邮箱 -->

<div class="container border-out">
    <div class="row">
        <div class="col-md-12">
            <div class="text-left write-comment">
                <span>写评论</span>
            </div>
            <div class="col-md-6 form-horizontal">
            {{--@if(Auth::guest())
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <label for="username" class="sr-only">用户名</label>
                        <input type="text" name="username" class="form-control" placeholder="你的名字">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <label for="email" class="sr-only">邮箱</label>
                        <div class="input-group-addon">@</div>
                        <input type="email" name="email" class="form-control" placeholder="你的邮箱">
                    </div>
                </div>
                <div class="clear-fix"></div>
            @endif--}}
                <div class="form-group">
                    {{ csrf_field() }}
                    <input type="hidden" name="bookId" id="bookId" value="{{ $bookDetail->id }}">
                    <input type="hidden" name="username" id="username" value="{{ isset(Auth::user()->name) ? (Auth::user()->name) : 'none' }}">
                    <div class="input-group">
                        <label for="commentContent" class="sr-only">评论内容</label>
                        <div class="input-group-addon"><span class="glyphicon glyphicon-edit"></span></div>
                        <textarea name="content" rows="6" class="form-control" cols="56"
                                  id="comment-write" placeholder="你的评论"></textarea>
                    </div>
                </div>
                <div class="clear-fix"></div>
                <div class="form-group col-md-2 col-sm-4 col-xs-4 submit">
                    <button type="submit" class="btn btn-default form-control" id="comment-post">评论</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 显示评论 -->
<div class="container border-out comment-show">
    <div class="row">
        <!-- 显示评论总条数 -->
        <div class="col-md-2 border-line">
            <h4>已有评论 (<span class="comment-count">{{ $count }}</span>)</h4>
        </div>
    </div>
    <!-- 每条评论详情 -->
    <div class="row">
        <div class="col-md-12">
            <div class="row" style="padding:0 1%;">
                <div class="media-list">
                    @foreach($comments as $comment)
                    <div class="media comment-content">
                        <div class="media-left">
                            <img src="{{ asset('static/images/avatar/'.$comment->comment_thumb.'.png') }}" class="avatar">
                        </div>
                        <div class="media-body comments">
                            <span class="media-heading">{{ $comment->content }}</span>
                            <h5 class="comment-border">
                                评论人: {{ $comment->comment_by }} &emsp;
                                评论时间: {{ $comment->updated_at }}
                            </h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>





