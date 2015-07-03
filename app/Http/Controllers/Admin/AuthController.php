<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 14:38
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Guard as Auth;
use App\Providers\Auth\AdminAuthUserProvider;
use App\Model\Admin;
use App\Enum\Admin as AdminEnum;


class AuthController extends Controller
{


    protected $viewPrefix = 'admin.auth';

    private $auth;


    public function __construct(Auth $auth, AdminAuthUserProvider $userProvider)
    {

        $this->auth = $auth;
        $this->auth->setProvider($userProvider);

        $this->middleware('auth.admin');

    }


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
     * @return $this|\App\Http\Controllers\Controller|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function postLogin()
    {

        //验证表单
        $this->validate([
            'admin_name' => 'required',
            'admin_pass' => 'required',
        ]);

        //获取表单数据
        $credentials = $this->request()->only(['admin_pass', 'admin_name']);
        $credentials['admin_status'] = AdminEnum::STATUS_NORMAL;
        //登录验证
        if ($this->auth->attempt($credentials, $this->request()->has('remember'))) {

            //登录成功,跳转回登录前页面

            return $this->success('登录成功', array(), $this->redirect()->intended('/admin'));

        }
        //TODO 异常代码
        return $this->error('用户不存在');
    }

}