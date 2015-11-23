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
        $selects = array('user_name', 'avatar', 'sex', 'height', 'birthday', 'province', 'salary', 'height', 'education');
        $user['male'] = User::male()->limit(18)->get($selects);
        $user['female'] = User::female()->limit(18)->get($selects);
        return $this->view('index')->with('users', $user);
    }

    public function getMale()
    {
        return $this->view('male');
    }

    public function getFemale()
    {
        return $this->view('female');

    }

    public function user(User $user)
    {
        return $this->view('vip');
    }
}