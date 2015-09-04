<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-11 12:42
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Model\Option;
use Overtrue\Wechat\Server as Server;
use Overtrue\Wechat\Message as Message;

class WechatController extends Controller
{


    protected $wechat;


    public function __construct(Request $request)
    {

        header('Access-Control-Allow-Origin: *');

        $options = Option::whereIn('key', ['wx_app_id', 'wx_token', 'wx_encoding_key', 'wx_app_secret'])->lists('value',
            'key');
        $this->wechat = new Server($options['wx_app_id'], $options['wx_token']);

    }


    public function index()
    {

        $this->wechat->on('message', 'text', function (){

            return Message::make()->content('您好');
        });


        return $this->wechat->serve();
    }


}