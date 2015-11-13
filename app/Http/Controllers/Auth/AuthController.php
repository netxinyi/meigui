<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{


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
