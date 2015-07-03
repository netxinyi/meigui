<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 14:38
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{


    protected $viewPrefix = 'admin.auth';


    /**
     * 跳转到登录页
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getIndex()
    {


        return redirect('/admin/auth/login');
    }


    /**
     * 显示登录页面
     * @return \Illuminate\View\View
     */
    public function getLogin()
    {

        return $this->view(config('admin.login_tpl', 'login_v2'));
    }


    /**
     * 执行登录操作
     */
    public function postLogin()
    {

        $this->validate([
            'admin_name' => 'required',
            'password'   => 'required'
        ]);

    }
}