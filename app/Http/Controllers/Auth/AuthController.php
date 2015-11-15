<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    //登录表单的账号字段名
    protected $username = 'mobile';
    //登录或报名成功以后跳转的页面(优先跳转到被拦截页面)
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {

        $this->middleware('guest', ['except' => 'getLogout']);
    }


    public function register()
    {

    }
}
