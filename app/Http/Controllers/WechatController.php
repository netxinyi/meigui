<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-11 12:42
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Model\Option;
use Overtrue\Wechat\Server;
use Overtrue\Wechat\Message;
use Overtrue\Wechat\User;
use Overtrue\Wechat\Auth as WxAuth;
use Overtrue\Wechat\Utils\Bag;
use App\Model\WxUser;

class WechatController extends Controller
{


    protected $wechat;

    protected $options;


    public function __construct(Request $request)
    {

        header('Access-Control-Allow-Origin: *');

        $this->options    = Option::whereIn('key',
            ['wx_app_id', 'wx_token', 'wx_encoding_key', 'wx_app_secret'])->lists('value', 'key');
        $this->wechat     = new Server($this->options['wx_app_id'], $this->options['wx_token']);
        $this->wechatUser = new User($this->options['wx_app_id'], $this->options['wx_app_secret']);

    }


    public function index()
    {

        $this->wechat->event('subscribe', function (){

            return Message::make('text')->content('感谢关注新依网络');
        });


        $this->wechat->on('message', function (Bag $userInfo){

            $this->save($userInfo);

            switch ($userInfo->get('Content')) {
                case '授权':
                case '我要授权':
                    return Message::make()->content("点击以下链接完成授权：\n <a href=\"http://114.215.135.10/weixin/authorize/" . $userInfo['FromUserName'] . '">点此授权</a>');
                    break;
                default:
                    return Message::make()->content("您说：" . $userInfo->get('Content'));
            }


        });


        return $this->wechat->serve();
    }


    public function authorize($openid)
    {

        $user = WxUser::openid($openid)->first();
        if (!( $user && $user->exists )) {
            $auth = new WxAuth($this->options['wx_app_id'], $this->options['wx_app_secret']);

            return $auth->authorize($to = null, $scope = 'snsapi_userinfo', $state = 'STATE');
        }

        return Message::make()->content("恭喜您:" . $user->nickname . "授权成功");
    }


    private function save(Bag $userInfo)
    {

        $user = WxUser::openid($userInfo->get('FromUserName'))->first();
        if (!( $user && $user->exists )) {
            //$wxInfo = $this->wechatUser->get($userInfo->get('FromUserName'));
            //dd($wxInfo);
        }
    }
}