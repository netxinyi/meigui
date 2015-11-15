<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 17:52
 */

namespace App\Http\Controllers;


class HomeController extends Controller
{

    protected $viewPrefix = 'home';

    public function getIndex()
    {
        return $this->view('index');
    }

    public function getXiangxi()
    {
        return $this->view('xiangxi');
    }

    public function getAvatar()
    {
        return $this->view('avatar');
    }

    public function getGallery()
    {
        return $this->view('gallery');

    }

    public function getZeou()
    {
        return $this->view('zeou');

    }

    public function getJieshao()
    {
        return $this->view('jieshao');

    }
}