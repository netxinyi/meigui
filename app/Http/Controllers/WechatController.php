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
use Overtrue\Wechat\Utils\Bag;
use App\Model\WxUser;

class WechatController extends Controller
{


    protected $wechat;


    public function __construct(Request $request)
    {

        header('Access-Control-Allow-Origin: *');

        $options = Option::whereIn('key', ['wx_app_id', 'wx_token', 'wx_encoding_key', 'wx_app_secret'])->lists('value',
            'key');
        $this->wechat = new Server($options['wx_app_id'], $options['wx_token']);
        $this->wechatUser = new User($options['wx_app_id'], $options['wx_app_secret']);

    }


    public function index()
    {

        $this->wechat->event('subscribe', function (){

            return Message::make('text')->content('感谢关注新依网络');
        });

        $this->wechat->on('message', function (Bag $userInfo){

            $this->save($userInfo);

            return Message::make()->content(md5(rand(100000, 999999)) . $userInfo->get('Context') . md5(rand(100000,
                    999999)));
        });


        return $this->wechat->serve();
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