<?php

namespace App\Http\Controllers\Auth;

use App\Model\Register;
use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    //登录表单的账号字段名
    protected $username = 'mobile';
    //登录或报名成功以后跳转的页面(优先跳转到被拦截页面)
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {

        $this->middleware('guest', ['except' => 'getLogout']);
    }


    public function getRegister()
    {

    }

    public function postRegister()
    {
        $this->validate($this->request(), array(
            'realname' => 'required',
            'mobile' => 'required|size:11|unique:users,mobile',
            'sex' => 'required:in:' . array_keys_impload(\App\Enum\User::$sexForm),
            'birthday' => 'required|date|after:-17 year',
            'marital_status' => 'required|in:' . array_keys_impload(\App\Enum\User::$maritalForm),
            'user_id' => 'exists:users,user_id'
        ), array(
            'realname.required' => '请填写真实姓名',
            'mobile.required' => '请填写手机号',
            'mobile.size' => '手机号格式不正确',
            'mobile.unique' => '手机号已被注册',
            'sex.required' => '请选择您的性别',
            'sex.in' => '您填写的性别有误',
            'birthday.required' => '请填写您的生日',
            'birthday.date' => '您填写的生日格式不正确',
            'birthday.after' => '不满18岁不允许注册',
            'marital_status.required' => '您填写您的婚姻状态',
            'marital_status.in' => '婚姻状态不正确',
            'user_id.exists' => '您报名的用户不存在'

        ));

        if (Register::where('mobile', $this->request()->get('mobile'))->first()) {
            return $this->error('您已注册,您耐心等待管理员审核');
        }

        $form = $this->request()->only(array('realname', 'mobile', 'sex', 'birthday', 'marital_status', 'user_id'));
        try {
            $user = Register::create($form);
            return $this->rest()->success($user, '报名成功,管理员审核通过后即可登录');
        } catch (\Exception $ex) {
            dd($ex->getMessage());
            return $this->rest()->error('抱歉,报名失败,请稍后再试');
        }

    }
}
