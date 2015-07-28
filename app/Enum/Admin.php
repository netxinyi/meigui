<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 12:01
 */

namespace App\Enum;

class Admin
{


    const STATUS_NORMAL = 1;

    const STATUS_STOP   = 2;


    const ROLE_SUPERADMIN = 1;

    const ROLE_ADMIN = 2;


    public static $statusForm = [
        self::STATUS_NORMAL => '正常',
        self::STATUS_STOP   => '已禁用'
    ];

    public static $rolesForm  = [
        self::ROLE_SUPERADMIN => '超级管理员',
        self::ROLE_ADMIN      => '普通管理员'
    ];

}