<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 17:52
 */

namespace App\Http\Controllers;

use App\Model\User;
use App\Http\Controllers\Session;

class HomeController extends Controller
{

    protected $viewPrefix = 'home';

    public function getIndex()
    {
        $data = user();
        dd($data);
      // $user_data =  User::get()->toArray();
 
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