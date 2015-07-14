<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-12 22:40
 */

namespace App\Providers\Wechat\Receive;

use Vicens\Wechat\Receive\Event as WechatEvent;

abstract class Event extends WechatEvent
{


    public function subscribe()
    {

        return 'sas';
    }

}