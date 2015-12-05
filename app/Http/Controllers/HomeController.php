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

    // 保存基本信息
     public function postUpdate()
    {
        //接收数据
        $data = $this->request()->only('user_name','height','education','marriage','salary');

          $this->validate($this->request(), array(
            'user_name' => 'required',
        ), array(
            'user_name.required' => '昵称不能为空！',
        ));

        user()->update($data);
        return $this->rest()->success('修改成功！');

    }


     // 保存详细信息
     public function postXiangxi()
    {
         //接收数据
        $info_data = $this->request()->only('card','stock','qq','email','origin_province','origin_city');
        $user_data = $this->request()->only('mobile');

        $this->validate($this->request(), $rules= array(
            'mobile' => 'required|digits:11|exists:users',
            'qq' => 'numeric',
            'email' => 'email',
        ), array(
            'mobile.required' => '手机号码不能为空',
            'mobile.digits' => '手机号码是11位',
            'qq.numeric' => 'QQ格式有误',
            'email.email' => '邮箱格式有误',
        ));

        user()->info()->update($info_data);
        user()->update($user_data);
        return $this->rest()->success('修改成功！');

    }

}