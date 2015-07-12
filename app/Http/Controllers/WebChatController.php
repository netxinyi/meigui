<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-11 12:42
 */

namespace App\Http\Controllers;


use Overtrue\Wechat\Server;
use Overtrue\Wechat\Message;
use Illuminate\Http\Request;
use App\Model\Option;
use Log;
use Vicens\WebChat\WebChat;
use Vicens\WebChat\Receive\Text;

class WebChatController extends Controller
{


    protected $wx;


    public function __construct(Request $request)
    {

        $options = Option::whereIn('key', ['wx_app_id', 'wx_token', 'wx_encoding_key', 'wx_app_secret'])->lists('value',
            'key');

        dd($this->request()->all());
        $this->wx = new WebChat($options);

    }


    public function index()
    {

        try{

            $this->wx->text(Text::class);


        } catch(\Exception $exception){
            throw $exception;
        }


    }


    public function createMenu()
    {

        $menu = $this->request()->all();

        if ($this->wx->menu($menu)) {
            return $this->success('创建菜单成功');
        } else {
            return $this->error('创建菜单失败');
        }
    }


}