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


    public function store()
    {

        //验证表单
        $this->validate([
            'user_name'          => 'required|min:5|max:15|unique:admins',
            'email'              => 'required|email|unique:admins',
            'admin_status'       => 'required|in:' . implode(',', array_keys(AdminEnum::$statusForm)),
            'admin_role'         => 'required|in:' . implode(',', array_keys(AdminEnum::$rolesForm)),
            'admin_pass'         => 'required|min:5|max:20',
            'admin_pass_confirm' => 'required|required_with:admin_pass|same:admin_pass'
        ]);
    }
}