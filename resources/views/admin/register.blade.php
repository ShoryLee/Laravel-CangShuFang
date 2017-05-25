@extends('admin.logRegLayouts')

@section('title')
    注册
@stop

@section('style')
    <style>
        #bg {
            float: left;
            width: 100%;
            height: 100%;
            position: absolute;
            background: url('{{ asset('static/images/bookshelf.jpg') }}') center center no-repeat;
        }
        #log-reg {
            margin-top: 20%;
            opacity: 0.95;
        }
        #name-error, #email-error, #password-error, #rePassword-error {
            color: #A0403E;
        }
    </style>
@stop
@section('content')
<div id="bg"></div>
<div class="container">
    <div class="row" id="log-reg">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h3>注册</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" id="name-label">姓&emsp;名</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="用于显示的名字"
                                       value="{{ old('name') }}" id="login-name">
                                <span class="help-block">
                                    <strong id="name-error"></strong>
                                </span>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" id="email-label">E-Mail</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="你的邮箱"
                                       value="{{ old('email') }}" id="email">
                                <span class="help-block">
                                    <strong id="email-error"></strong>
                                </span>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" id="password-label">密&emsp;码</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password"
                                       placeholder="不小于6位的密码" id="password">
                                <span class="help-block">
                                    <strong id="password-error"></strong>
                                </span>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" id="rePassword-label">密码确认</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation"
                                       placeholder="重复一遍密码" id="login-rePassword">
                                <span class="help-block">
                                    <strong id="rePassword-error"></strong>
                                </span>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="reg">
                                    <i class="fa fa-btn fa-user"></i> 注册
                                </button>
                                <a class="btn btn-link" href="{{ url('/admin/login') }}">已有账号?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop