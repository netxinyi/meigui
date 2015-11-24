<?php
namespace App\Http\Controllers;

use App;
use Overtrue\Wechat\Server;
use Overtrue\Wechat\Message;
use Overtrue\Wechat\Menu;
use Overtrue\Wechat\MenuItem;
use Log;
use Illuminate\Http\Request;
use Auth;
use App\Model\User;
use App\Model\Signup;

class WechatController extends Controller
{


    protected $viewPrefix = 'wechat';


    public function getLogin()
    {

        return $this->view('login');
    }


    public function postLogin()
    {

        //验证字段有效性
        $this->validate($this->request(), $rules = array(
            'mobile'   => 'required|digits:11|exists:users',
            'password' => 'required|min:6',
        ), $message = [
            'mobile.exists'     => '手机号不存在',
            'mobile.required'   => '手机号不能为空',
            'mobile.digits'     => '手机号格式不正确',
            'password.required' => '密码不能为空',
            'password.min'      => '密码最少6位',
        ], $customAttributes = [

        ]);
        $credentials = $this->request()->only(['mobile', 'password']);
        if (Auth::attempt($credentials)) {
            return $this->success('登录成功', array(), $this->redirect()->intended('/weixin/register'));
        }

        return $this->error('手机号或密码不正确');
    }


    public function getRegister()
    {

        return $this->view('register');
    }


    public function postRegister()
    {

        //验证字段有效性
        $this->validate($this->request(), $rules = array(
            'mobile'    => 'required|digits:11|unique:users',
            'password'  => 'required|confirmed|min:6',
            'email'     => 'required|email|unique:users',
            'user_name' => 'required',
            'birthday'       => 'required',
            'nick'      => 'required',
        ), $message = [
            'mobile.required'    => '请输入你的手机号',
            'mobile.digits'      => '手机号格式不正确',
            'mobile.unique'      => '该手机号已被注册',
            'password.required'  => '请输入密码',
            'password.confirmed' => '两次输入的密码不一致',
            'password.min'       => '密码最少6位',
            'email.required'     => '请输入你的邮箱',
            'email.email'        => '不是合法的邮箱格式',
            'email.unique'       => '该邮箱已经存在',
            'user_name.required' => '请输入你的姓名',
            'birthday.required'  => '请输选择你的生日',
            'nick.required'      => '请输入昵称',
        ], $customAttributes = [

        ]);
        //获取表单数据
        $reginfo             = $this->request()->only([
            'mobile',
            'nick',
            'password',
            'email',
            'user_name',
            'sex',
            'birthday'
        ]);
        $reginfo['password'] = bcrypt($reginfo['password']);
        //插入注册信息
        if ($users = User::create($reginfo)) {
            //注册成功，跳转到登陆界面
            return $this->success('注册成功', array(), $this->redirect()->intended('/weixin/login'));
        }
    }

	//微信报名
	public function getSignup(){
		return $this->view('signup');
	}

	public function postSignup(){
		//验证字段有效性
		$this->validate($this->request(), $rules = array(
			'realname'        => 'required',
			'mobile'          => 'required|digits:11',
			'birthday'        => 'required',
			'sex'             => 'required',
			'marital_status' => 'required',
		), $message = [
			'realname.required'  => '请输入真实姓名',
			'mobile.required'    => '请输入你的手机号',
			'mobile.digits'      => '手机号格式不正确',
			'birthday.required'  => '请选择生日',
			'sex.require'        => '请选择性别',
			'age.digits'         => '你输入的年龄格式不正确',
			'marital_status.required'      => '请选择婚姻状况',
		], $customAttributes = [

		]);
		//获取表单数据
		$signupinfo             = $this->request()->only([
			'user_id',
			'realname',
			'mobile',
			'birthday',
			'sex',
			'marital_status'
		]);
		//插入注册信息
		if ($users = Signup::create($signupinfo)) {
			//注册成功，跳转到登陆界面
			return $this->success('报名成功', array(), $this->redirect()->intended('/weixin/login'));
		}
	}
    /**
     * 处理微信的请求消息
     *
     * @param Server $server
     *
     * @return string
     */
    public function anyApi(Server $server)
    {

        //关注回复
        $server->on('event', 'subscribe', function ($event){

            return Message::make('text')->content('您好！欢迎关注玫瑰花开网');
        });
        /*$button = new MenuItem("公司介绍");
        $buttona = new MenuItem("活动专场");
        $buttonb = new MenuItem("个人中心");

        $menus = array(
            $button->buttons(array(
                new MenuItem('关于公司', 'click', 'about'),
                new MenuItem('业务介绍', 'click', 'business'),
                new MenuItem('联系我们', 'click', 'contact'),
                new MenuItem('婚恋业务', 'click', 'marry'),
            )),
            $buttona->buttons(array(
                new MenuItem('待选嘉宾', 'click', 'guest'),
                new MenuItem('才俊专场', 'click', 'talent'),
                new MenuItem('成功案例', 'click', 'case'),
                new MenuItem('会员搜索', 'click', 'search'),
            )),
            $buttonb->buttons(array(
                new MenuItem('注册会员', 'view', 'http://www.soso.com/'),
                new MenuItem('绑定账号', 'click', 'binding'),
            )),
        );

        try {
            //$menu = new Menu('wxd4a0943fa53c5435','22f260d0c5a4736ed7bb50558d52b720');
            $menu =  App::make('Overtrue\Wechat\Menu');
            $menu->set($menus);// 请求微信服务器
            echo '设置成功！';
        } catch (\Exception $e) {
            echo '设置失败：' . $e->getMessage();
        }*/
        $server->on('event', 'click', function ($event){

            switch ($event->EventKey) {
                case 'about':
                    return Message::make('news')->items(function (){

                        return array(
                            Message::make('news_item')->title('公司介绍')->description('玫瑰花开公司介绍')->url('http://baidu.com/abc.php')->picUrl('http://www.baidu.com/demo.jpg'),
                        );
                    });
                    break;
                case 'business':
                    return Message::make('news')->items(function (){

                        return array(
                            Message::make('news_item')->title('业务介绍')->description('玫瑰花开业务介绍')->url('http://baidu.com/abc.php')->picUrl('http://www.baidu.com/demo.jpg'),
                        );
                    });
                    break;
                case 'contact':
                    return Message::make('text')->content('您好！联系我们');
                    break;
                case 'marry':
                    return Message::make('news')->items(function (){

                        return array(
                            Message::make('news_item')->title('婚恋业务')->description('玫瑰花开婚恋业务')->url('http://baidu.com/abc.php')->picUrl('http://www.baidu.com/demo.jpg'),
                        );
                    });
                    break;
                case 'guest':
                    return Message::make('news')->items(function (){

                        return array(
                            Message::make('news_item')->title('待选嘉宾')->description('玫瑰花开待选嘉宾')->url('http://baidu.com/abc.php')->picUrl('http://www.baidu.com/demo.jpg'),
                        );
                    });
                    break;
                case 'talent':
                    return Message::make('news')->items(function (){

                        return array(
                            Message::make('news_item')->title('才俊专场')->description('玫瑰花开才俊专场')->url('http://baidu.com/abc.php')->picUrl('http://www.baidu.com/demo.jpg'),
                        );
                    });
                    break;
                case 'case':
                    return Message::make('news')->items(function (){

                        return array(
                            Message::make('news_item')->title('成功案例')->description('玫瑰花开业成功案例')->url('http://baidu.com/abc.php')->picUrl('http://www.baidu.com/demo.jpg'),
                        );
                    });
                    break;
                case 'search':
                    return Message::make('news')->items(function (){

                        return array(
                            Message::make('news_item')->title('会员搜索')->description('玫瑰花开会员搜索')->url('http://baidu.com/abc.php')->picUrl('http://www.baidu.com/demo.jpg'),
                        );
                    });
                    break;
                case 'binding':
                    $openid = $event->FromUserName;

                    return Message::make('news')->items(function () use ($openid){

                        return array(
                            Message::make('news_item')->title('绑定会员')->description('玫瑰花开绑定会员')->url('http://www.jiaozhixin.com/wxopenid/index.php?openid=' . $openid)->picUrl('http://www.baidu.com/demo.jpg'),
                        );
                    });
                    break;
            }
        });

        return $server->serve(); // 或者 return $server;
    }
}