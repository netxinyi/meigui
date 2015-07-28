<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-11 09:14
 */

namespace App\Enum;


class GuestBook
{


    #留言状态-正常
    const STATUS_OK = 1;

    #留言状态-已关闭
    const STATUS_STOP = 2;

    #留言状态组
    public static $statusForm = [
        self::STATUS_OK   => '正常',
        self::STATUS_STOP => '已关闭'
    ];

}