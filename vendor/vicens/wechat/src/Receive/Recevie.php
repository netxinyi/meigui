<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-12 22:34
 */

namespace Vicens\Wechat\Receive;


abstract class Recevie
{


    protected $toUserName;

    protected $fromUserName;

    protected $createTime;

    protected $msgType;


    public function __construct($wxMsg)
    {

        $this->toUserName = $wxMsg->toUserName;
    }


    final public function response($method)
    {

        return $this->{$method}();
    }
}