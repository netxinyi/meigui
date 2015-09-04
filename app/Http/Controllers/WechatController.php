<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-11 12:42
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Model\Option;
use Overtrue\LaravelWechat;

class WechatController extends Controller
{


    protected $wx;


    public function __construct(Request $request)
    {


        $options = Option::whereIn('key', ['wx_app_id', 'wx_token', 'wx_encoding_key', 'wx_app_secret'])->lists('value',
            'key');



    }


    public function index()
    {

    }


}