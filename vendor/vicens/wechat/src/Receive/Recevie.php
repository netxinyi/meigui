<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-12 22:34
 */

namespace Vicens\Wechat\Receive;


use Overtrue\Wechat\Message;
use Vicens\Wechat\Messages\BaseMessage;

abstract class Recevie
{


    protected $toUserName;

    protected $fromUserName;

    protected $createTime;

    protected $msgType;


    public function __construct($wxMsg)
    {

        $this->toUserName   = $wxMsg['toUserName'];
        $this->fromUserName = $wxMsg['fromUserName'];
        $this->createTime   = $wxMsg['createTime'];
        $this->msgType      = $wxMsg['msgType'];
    }


    final public function response($method)
    {

        if (method_exists($this, $method)) {
            $message = $this->{$method}();
        } else {
            $message = $this->defaultMsg();
        }

        if ($message instanceof BaseMessage) {
            $message = Message::make('text')->with('content', $message);
        }

        return $message;
    }


    public function defaultMsg()
    {

        return '';
    }
}