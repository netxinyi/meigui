<?php


namespace App\Enum;


class Assembly
{

    #首页状态-显示
    const DISPLAY_BLOCK = '显示';

	#发布类型-我要结婚
    const DISPLAY_NONE = '不显示';

    #婚恋类型
    public static $displayLang = [
        self::DISPLAY_BLOCK => '显示',
        self::DISPLAY_NONE => '不显示'
    ];

}