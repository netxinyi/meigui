<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 17:52
 */

namespace App\Http\Controllers;


class MemberController extends Controller
{

    protected $viewPrefix = 'member';

    public function index()
    {
        return $this->view('index');
    }

}