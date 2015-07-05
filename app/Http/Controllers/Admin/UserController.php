<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-05 14:43
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User;

class UserController extends Controller
{


    protected $viewPrefix = 'admin.user';


    public function index()
    {

        $users = User::all(['user_id', 'user_name', 'sex', 'email', 'mobile', 'created_at']);

        return $this->view('index')->with('users', $users);
    }


    public function create()
    {

        return $this->view('create');

    }
}