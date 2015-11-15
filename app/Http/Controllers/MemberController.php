<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 17:52
 */

namespace App\Http\Controllers;


use App\Model\User;

class MemberController extends Controller
{

    protected $viewPrefix = 'member';

    public function index()
    {
        return $this->view('index');
    }

    public function user(User $user)
    {
        return $this->view('vip');
    }
}