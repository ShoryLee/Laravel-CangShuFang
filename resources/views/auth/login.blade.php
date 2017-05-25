@extends('common.layouts')

@section('title')
    登录
@stop

@section('style')
    <style>
        #email-error,#password-error {
            color: #A0403E;
        }
    </style>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>登录</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" id="email-label">E-Mail</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="你的电子邮箱"
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
                                       placeholder="你的密码" id="password">
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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> 记住账号
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="login">
                                    <i class="fa fa-btn fa-sign-in"></i>登录
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">忘记密码?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
