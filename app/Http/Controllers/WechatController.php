<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-11 12:42
 */

namespace App\Http\Controllers;


use App\Model\WxMessage;
use Illuminate\Database\Eloquent\Collection;
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


    }



    public function messages()
    {

        $lastId = 0;
        header('Content-Type: text/event-stream');

        while (true) {


            $messages = WxMessage::where('message_time', '>', date('Y-m-d H:i:s', time() - 3600))->where('message_id',
                '>', $lastId)->with('user')->get();
            if ($messages->last()) {
                $lastId = $messages->last()->message_id;
            }


            echo "data: " . $messages->toJson() . "\n\n";
            ob_flush();
            flush();
            sleep(3);
        }
    }


    public function wxapi()
    {

        $this->wechat->event('subscribe', function (){

            return Message::make('text')->content('感谢关注新依网络');
        });


        $this->wechat->on('message', function (Bag $userInfo){

            $user    = $this->save($userInfo);
            $content = $userInfo->get('Content');
            $message = new WxMessage(array(
                'type'          => 'text',
                'content'       => $content,
                'message_time'  => date('Y-m-d H:i:s', time()),
                'wx_message_id' => $userInfo['MsgId']
            ));
            $user->messages()->save($message);
            switch ($content) {
                case '授权':
                case '我要授权':
                    return Message::make()->content("点击以下链接完成授权：\n <a href=\"http://114.215.135.10/weixin/authorize/" . $userInfo['FromUserName'] . '">点此授权</a>');
                    break;
                default:
                    return Message::make()->content($user->nickname . $userInfo->get('Content'));
            }


        });


        return $this->wechat->serve();
    }


    public function authorize($openid)
    {

        $user = WxUser::openid($openid)->first();
        if (!( $user && $user->exists )) {
            $auth = new WxAuth($this->options['wx_app_id'], $this->options['wx_app_secret']);

            return $auth->authorize();
        }

        return Message::make()->content("恭喜您:" . $user->nickname . "授权成功");
    }


    private function save(Bag $userInfo)
    {

        $user = WxUser::openid($userInfo->get('FromUserName'))->first();
        if (!( $user && $user->exists )) {
            //$wxInfo = $this->wechatUser->get($userInfo->get('FromUserName'));
            //dd($wxInfo);
            $user = WxUser::create(array(
                'openid'         => $userInfo->get('FromUserName'),
                'nickname'       => '迁迁' . rand(1, 9999),
                'sex'            => rand(0, 1),
                'country'        => '中国',
                'province'       => '河北',
                'city'           => '邢台',
                'avatar'         => 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLC11iaTPfGbdHUicPBALG3IWicILXibyrkGQnyib6CvicxpSApR6m4WwYOwhNwicb8pI3KvCUAm9K6djum5A/0',
                'remark'         => '',
                'subscribe_time' => time()
            ));

        }

        return $user;
    }
}