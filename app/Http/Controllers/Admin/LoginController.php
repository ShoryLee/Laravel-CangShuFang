<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class LoginController extends Controller
{
    //
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    //登录成功后跳转
    protected $redirectTo = 'admin/management';
    protected $guard = 'admin';
    protected $loginView = 'admin/login';
    protected $registerView = 'admin/register';
    protected $redirectAfterLogout = 'admin/login';

    public function __construct()
    {
        $this->middleware('admin', ['except' => 'logout']);
    }
    
    //验证数据
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|unique:admins',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|confirmed|min:6',
        ]);
    }
    
    //写入数据库
    public function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'thumb' => mt_rand(0, 35),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            ]);
    }
}
