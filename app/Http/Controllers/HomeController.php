<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 14:56
 */

namespace App\Http\Controllers;


class HomeController extends Controller
{

    public function getIndex()
    {
        return $this->view('home');
    }
}