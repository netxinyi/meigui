<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-05 09:48
 */

namespace App\Enum;


class Scase
{

    #发布类型-鸳鸯谱
    const PUBLISH_YUANYANGPU = 1;

	#发布类型-我要结婚
    const PUBLISH_MARRY = 2;

    #婚恋类型
    public static $publishLang = [
        self::PUBLISH_YUANYANGPU => '鸳鸯谱',
        self::PUBLISH_MARRY => '我要结婚',
    ];

}