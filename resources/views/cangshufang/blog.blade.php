@extends('common.layouts')

@section('title')
    博客
@stop

@section('style')
    <style type="text/css">

    </style>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>这是每天的进度博客和感想，可是啥都没有啊.............</p>
                <h3>遗留问题</h3>
                <ul>
                    <li><strong>管理员注册于登录于普通用户注册登录没有打通连接</strong></li>
                    <li>从分类目录里点击的书籍详情（旧的）与其他方式进入的书籍详情（新的）URL不同，目前并无问题</li>
                    <li>用户头像依然是随机出来的</li>
                    <li>标记于2017-01-23</li>
                    {{--<li>标记于{{ date('Y-m-d') }}</li>--}}
                </ul>
                <strong>用户头像问题貌似已经解决</strong>
                <p>标记于2017-02-04</p>
                {{--标记于{{ date('Y-m-d') }}--}}
                <strong>以上问题似乎都已经解决</strong>
                <ul>
                    <li>网站基本正常，存在问题：</li>
                    <li>js检查用户和管理员注册和登录公用一套方案，导致只能检测其中一种</li>
                    <li>js中登录和注册公用邮箱和密码检测，造成对button禁用的不准确问题</li>
                    <li>管理员登录和注册必须手动输入http://localhost/cangshufang/public/admin/login(register)</li>
                    <li>否则，会直接跳转到用户登录页面</li>
                </ul>
            </div>
        </div>
    </div>
@stop