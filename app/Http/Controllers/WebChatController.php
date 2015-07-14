<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-11 12:42
 */

namespace App\Http\Controllers;

use Vicens\Wechat\Wechat;
use Illuminate\Http\Request;
use App\Model\Option;
use Vicens\Wechat\Receive\Recevie;
use Vicens\Wechat\Receive\Event;
use Vicens\Wechat\Http\Request as WechatRequest;

class WebChatController extends Controller
{


    protected $wx;


    public function __construct(Request $request)
    {


        $options = Option::whereIn('key', ['wx_app_id', 'wx_token', 'wx_encoding_key', 'wx_app_secret'])->lists('value',
            'key');


        $this->wx = new Wechat($options['wx_app_id'], $options['wx_token'], $options['wx_encoding_key']);


    }


    public function index()
    {

        $this->wx->event(\App\Providers\Wechat\Receive\Event::class);

        return $this->wx->signature()->response();

    }


}