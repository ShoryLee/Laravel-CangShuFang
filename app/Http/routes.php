<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //首页
    Route::get('/', 'CangShuFangController@index');
    Route::get('index', 'CangShuFangController@index');
//书籍详情页
    Route::get('detail/{isbn}', 'CangShuFangController@detail');
//分类页面
    Route::get('category/{categoryName}/{isbn?}', 'CangShuFangController@category')->name('category');
//搜索建议
    Route::get('searchSuggest/{value}' ,'AjaxController@searchSuggest');
//搜索页面
    Route::get('search/{bookInfo?}' ,'CangShuFangController@search');
//目录页面
    Route::get('catalog' ,'CangShuFangController@catalog');
//添加评论
    Route::post('commentPost', 'AjaxController@commentPost');
//打分
    Route::post('starRating', 'AjaxController@starRating');
//新增一本书
    Route::post('addNewBook', 'AjaxController@addNewBook');
//更新一本书
    Route::post('updateBook', 'AjaxController@updateBook');
//更新评论
    Route::post('updateComment', 'AjaxController@updateComment');
//注册管理员检查是否存在
    Route::get('checkAdmin/{nameOrEmail}', 'AjaxController@checkAdmin');
//管理页面路由群组
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
        //注册登录
        Route::get('login', 'LoginController@getLogin');
        Route::post('login', 'LoginController@postLogin');
        Route::get('register', 'LoginController@getRegister');
        Route::post('register', 'LoginController@postRegister');
        Route::get('logout', 'LoginController@logout');
        Route::post('logout', 'LoginController@logout');
        //管理页面
        Route::get('management', 'ManagementController@management');

        //新增书籍
        Route::get('addBook', 'ManagementController@addBook');
        //管理书籍
        Route::get('manageBook', 'ManagementController@manageBook');
        //书籍信息编辑
        Route::get('manageBook/editBook', 'ManagementController@editBook');
        //书籍删除
        Route::get('manageBook/deleteBook', 'ManagementController@deleteBook');
        //评论管理
        Route::get('manageComment', 'ManagementController@manageComment');
        //评论编辑
        Route::get('manageComment/editComment', 'ManagementController@editComment');
        //评论删除
        Route::get('manageComment/deleteComment', 'ManagementController@deleteComment');

    });

//博客
    Route::get('blog', 'CangShuFangController@blog');
//关于我们
    Route::get('about', 'CangShuFangController@about');
//验证码
    Route::get('authCode', 'CangShuFangController@authCode');
//动态
    Route::get('dynamic', 'CangShuFangController@dynamic');
});

//登录及注册相关
Route::group(['middleware' => 'web'], function () {

    Route::auth();
    Route::get('/home', 'HomeController@index');
});
////登录及注册相关
//Route::group(['middleware' => 'web'], function () {
//
//    Route::auth();
//    Route::get('/admin', '\Admin\AdminController@index');
//});
