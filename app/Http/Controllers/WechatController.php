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
use App\Model\UserBind;
use Illuminate\Support\Facades\Config;
use \DB;

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
            'mobile' => 'required|digits:11|exists:users',
            'password' => 'required|min:6',
        ), $message = [
            'mobile.exists' => '该手机号不存在',
            'mobile.required' => '手机号不能为空',
            'mobile.digits' => '手机号格式不正确',
            'password.required' => '密码不能为空',
            'password.min' => '密码最少6位',
        ], $customAttributes = [

        ]);
        $credentials = $this->request()->only(['mobile', 'password']);
        $bindinfo = $this->request()->only('openid');
        if (Auth::attempt($credentials)) {
            $bindinfo['user_id'] = Auth::user()->user_id;
            $user_id = UserBind::where('user_id', $bindinfo['user_id'])->exists();
            //判断用户是否已经绑定,绑定更新openid,未绑定创建绑定
            if ($user_id) {
                $bind = UserBind::where('user_id', '=', $bindinfo['user_id'])->first();
                $bind->openid = $bindinfo['openid'];
                $bind->save();
            } else {
                UserBind::create($bindinfo);
            }
            return "<script>alert('绑定成功,请关闭当前页面');
				//</script>";
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
            'mobile' => 'required|digits:11|unique:users',
            'readlname' => 'required',
            'sex' => 'required',
            'birthday' => 'required',
            'marriage' => 'required',
        ), $message = [
            'mobile.required' => '请输入你的手机号',
            'mobile.digits' => '手机号格式不正确',
            'mobile.unique' => '该手机号已被注册',
            'realname.required' => '请输入你的真实姓名',
            'sex.required' => '请选择性别',
            'birthday.required' => '请输选择你的生日',
            'marriage' => '请选择婚姻状况',
        ], $customAttributes = [

        ]);
        //获取表单数据
        $reginfo = $this->request()->only([
            'mobile',
            'realname',
            'sex',
            'birthday',
            'marriage',
        ]);
        //dd($reginfo);
        //插入注册信息
        if ($users = User::create($reginfo)) {
            $users->bind()->create(array(
                'openid' => $this->request()->get('openid')
            ));
            //注册成功，跳转到登陆界面
            return "<script>alert('报名成功，等待客服联系');
				</script>;";
        }
    }

    //微信报名
    /*public function getSignup(){
        return $this->view('signup');
    }

    public function postSignup(){
        //验证字段有效性
        $this->validate($this->request(), $rules = array(
            'realname'        => 'required',
            'mobile'          => 'required|digits:11',
            'birthday'        => 'required',
            'sex'             => 'required',
            'marriage' => 'required',
        ), $message = [
            'realname.required'  => '请输入真实姓名',
            'mobile.required'    => '请输入你的手机号',
            'mobile.digits'      => '手机号格式不正确',
            'birthday.required'  => '请选择生日',
            'sex.require'        => '请选择性别',
            'age.digits'         => '你输入的年龄格式不正确',
            'marriage'      => '请选择婚姻状况',
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
    }*/
    /**
     * 处理微信的请求消息
     *
     * @param Server $server
     *
     * @return string
     */
    public function anyApi()
    {
        $url = Config::get('app.url');

        $server = new Server(option('wechat_app_id'), option('wechat_token'), option('wechat_encode_key'));
        //关注回复
        $server->on('event', 'subscribe', function ($event) {

            return Message::make('text')->content('您好！欢迎关注玫瑰花开网');
        });
        /*$button = new MenuItem("公司介绍",'click', 'about');
        $buttona = new MenuItem("活动专场",'click','activity');
        $buttonb = new MenuItem("个人中心",'click','person');

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
            $button,
            $buttona,
            $buttonb,
        );

        try {
            //$menu = new Menu('wxd4a0943fa53c5435','22f260d0c5a4736ed7bb50558d52b720');
            $menu =  App::make('Overtrue\Wechat\Menu');
            $menu->set($menus);// 请求微信服务器
            echo '设置成功！';
        } catch (\Exception $e) {
            echo '设置失败：' . $e->getMessage();
        }*/
        $server->on('event', 'click', function ($event) use ($url) {

            switch ($event->EventKey) {
                case 'about':
                    return Message::make('news')->items(function () use ($url) {

                        return array(
                            Message::make('news_item')->title('关于公司')->description('玫瑰花开公司介绍')->url($url . '/article/1')->picUrl('http://www.baidu.com/demo.jpg'),
                            Message::make('news_item')->title('业务介绍')->description('玫瑰花开业务介绍')->url($url . '/article/9')->picUrl('http://www.baidu.com/demo.jpg'),
                            Message::make('news_item')->title('联系我们')->description('联系我们')->url($url . '/article/10')->picUrl('http://www.baidu.com/demo.jpg'),
                            Message::make('news_item')->title('婚恋业务')->description('玫瑰花开婚恋业务')->url($url . '/article/11')->picUrl('http://www.baidu.com/demo.jpg'),
                        );

                    });
                    break;
                case 'activity':
                    return Message::make('news')->items(function () use ($url) {

                        return array(
                            Message::make('news_item')->title('活动专场')->description('玫瑰花开活动专场')->url($url)->picUrl('http://www.baidu.com/demo.jpg'),
                            Message::make('news_item')->title('待选嘉宾')->description('玫瑰花开待选嘉宾')->url($url . '/article/12')->picUrl('http://www.baidu.com/demo.jpg'),
                            Message::make('news_item')->title('才俊专场')->description('玫瑰花开才俊专场')->url($url . '/viplist_member')->picUrl('http://www.baidu.com/demo.jpg'),
                            Message::make('news_item')->title('成功案例')->description('玫瑰花开业成功案例')->url($url . '/article/13')->picUrl('http://www.baidu.com/demo.jpg'),
                            Message::make('news_item')->title('会员搜索')->description('玫瑰花开会员搜索')->url($url . '/search')->picUrl('http://www.baidu.com/demo.jpg'),
                        );
                    });
                    break;
                case 'person':
                    $openid = $event->FromUserName;

                    return Message::make('news')->items(function () use ($openid, $url) {

                        return array(
                            Message::make('news_item')->title('报名通道')->description('参与玫瑰花开报名')->url($url . '/weixin/register?openid=' . $openid)->picUrl('http://www.baidu.com/demo.jpg'),
                            Message::make('news_item')->title('绑定会员')->description('绑定会员')->url($url . '/weixin/login?openid=' . $openid)->picUrl('http://www.baidu.com/demo.jpg'),
                        );
                    });
                    break;
            }
        });

        return $server->serve(); // 或者 return $server;
    }
}