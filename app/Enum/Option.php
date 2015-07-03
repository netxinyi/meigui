<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-03 22:22
 */

namespace App\Enum;


class Option
{


    const INPUT_TYPE_TEXT     = 1;

    const INPUT_TYPE_SELECT   = 2;

    const INPUT_TYPE_RADIO    = 3;

    const INPUT_TYPE_CHECKBOX = 4;

    const INPUT_TYPE_TEXTAREA = 5;

    public static $inputTypes     = [
        self::INPUT_TYPE_TEXT,
        self::INPUT_TYPE_SELECT,
        self::INPUT_TYPE_RADIO,
        self::INPUT_TYPE_CHECKBOX,
        self::INPUT_TYPE_TEXTAREA
    ];

    public static $inputTypesForm = [
        self::INPUT_TYPE_TEXT     => '文本框',
        self::INPUT_TYPE_SELECT   => '下拉菜单',
        self::INPUT_TYPE_RADIO    => '单选按钮',
        self::INPUT_TYPE_CHECKBOX => '多选按钮',
        self::INPUT_TYPE_TEXTAREA => '文本域'
    ];

}