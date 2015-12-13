<?php

namespace App\Http\Controllers\Auth;

use App\Model\Register;
use App\Model\User;
use App\Http\Controllers\Controller;
use App\Model\UserInfo;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

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

    public function getSocialite()
    {

        $type = $this->request()->segment(3);

        return Socialite::with($type)->redirect();
    }
    public function getCallback()
    {

        $type = $this->request()->segment(3);

        $info = Socialite::driver($type)->user();

        //已经在本站注册
        if ($bind = UserBind::openId($info->getId())->first()) {

            $user = User::find($bind->user_id);
            //更新accessToken和过期时间
            $bind->update(array(
                'access_token' => $info->token
            ));
            //登录成功,跳转到登录前页面
            Auth::login($user);
            return $this->redirect()->intended('/');
        } else {

            //还没有在本站注册,跳转到账号绑定页面
            $info->from = $type;
            Session::put('social-info', $info);
            return $this->redirect('/socialite/bind');
        }

    }

    public function postLogin()
    {

        $this->validate($this->request(), [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);

        $throttles = in_array(
            \ThrottlesLogins::class, class_uses_recursive(get_class($this))
        );

        if ($throttles && $this->hasTooManyLoginAttempts($this->request())) {
            return $this->sendLockoutResponse($this->request());
        }
        //TODO 用户状态检查
        if (\Auth::attempt($this->getCredentials($this->request()), $this->request()->has('remember'))) {
            if ($throttles) {
                $this->clearLoginAttempts($this->request());
            }

            return $this->rest()->success(user(), '登录成功');
        }

        if ($throttles) {
            $this->incrementLoginAttempts($this->request());
        }

        return $this->rest()->error("登录失败,账号或密码错误");
    }

    public function getLogin()
    {
        return $this->redirect()->to('/');
    }

    public function getRegister()
    {
        return $this->redirect()->to('/');
    }

    public function postRegister()
    {

        $this->validate($this->request(), array(
            'realname' => 'required',
            'mobile' => 'required|size:11|unique:users,mobile',
            'sex' => 'required:in:' . array_keys_impload(\App\Enum\User::$sexLang),
            'birthday' => 'required|date',
            'marriage' => 'required|in:' . array_keys_impload(\App\Enum\User::$marriageLang),
            'like' => 'exists:users,user_id'
        ), array(
            'realname.required' => '请填写真实姓名',
            'mobile.required' => '请填写手机号',
            'mobile.size' => '手机号格式不正确',
            'mobile.unique' => '手机号已被注册',
            'sex.required' => '请选择您的性别',
            'sex.in' => '您填写的性别有误',
            'birthday.required' => '请填写您的生日',
            'birthday.date' => '您填写的生日格式不正确',
            'marriage.required' => '您填写您的婚姻状态',
            'marriage.in' => '婚姻状态不正确',
            'like.exist' => '您报名的对象不存在'
        ));

        $form = $this->request()->only('realname', 'mobile', 'sex', 'birthday', 'marriage');
        try {
            transaction();
            //创建用户
            $user = User::create($form);

            if ($this->request()->has('like')) {
                //创建喜欢的人
                $user->like()->create(array(
                    'like_user_id' => $this->request()->get('like')
                ));
            }
            //创建用户信息
            $user->info()->create(array());
            //创建择偶条件
            $user->object()->create(array(
                //初始化性别,不允许同性恋
                'sex' => $user->sex == \App\Enum\User::SEX_FEMALE ? \App\Enum\User::SEX_MALE : \App\Enum\User::SEX_FEMALE
            ));
            commit();
            return $this->rest()->success($user, '报名成功,管理员审核通过后即可登录');
        } catch (\Exception $ex) {
            rollback();
            dd($ex->getMessage());
            return $this->rest()->error('抱歉,报名失败,请稍后再试');
        }

    }


}
