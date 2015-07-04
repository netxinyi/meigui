<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-03 20:11
 */


if (!function_exists('transaction')) {

    /**
     * 开启事务
     * @return mixed
     */
    function transaction()
    {

        return DB::beginTransaction();
    }
}

if (!function_exists('commit')) {

    /**
     * 提交事务
     * @return mixed
     */
    function commit()
    {

        return DB::commit();
    }
}
if (!function_exists('rollback')) {

    /**
     * 回滚事务
     * @return mixed
     */
    function rollback()
    {

        return DB::rollback();
    }
}