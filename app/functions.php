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

/**
 * 获取event实例
 */
if (!function_exists('event')) {
    function event()
    {

        return App::make('event');
    }
}

/**
 * 监听一个事件
 */
if (!function_exists('addEvent')) {
    function addEvent()
    {

        return event()->listen(func_get_args());
    }
}

/**
 * 触发一个事件
 */
if (!function_exists('触发一个事件')) {
    function fireEvent()
    {

        return event()->fire(func_get_args());
    }
}
/**
 * 将一个事件放入异步后台,并立即执行
 */
if (!function_exists('触发一个事件')) {
    function pushEvent()
    {

        return event()->push(func_get_args());
    }
}

/**
 * 获取app配置参数
 */
if (!function_exists('option')) {

    function option($key, $default = '')
    {

        return config('app.' . $key, $default);
    }
}

/**
 * 获取数组所有的key,然后用逗号拼接
 */
if (!function_exists('array_keys_impload')) {

    function array_keys_impload(array $array, $splide = ',')
    {

        return implode($splide, array_keys($array));
    }
}

//判断是否登录
if (!function_exists('isLogin')) {
    function isLogin()
    {
        return Auth::check();
    }
}

//获取当前登录用户
if (!function_exists('user')) {
    function user()
    {
        return Auth::user();
    }
}
/**
 * 根据年龄算生日的年
 * @param $age
 * @return bool|string
 */
function ageToYear($age)
{
    $time = strtotime(-$age);
    return date('Y-m-d', $time);
}

function urlAdd($key, $val)
{
    $paramters = Request::query();
    if (is_null($val)) {
        unset($paramters[$key]);
    } else {
        $paramters[$key] = $val;

    }
    return '?' . http_build_query($paramters);
}

function queryActive($key, $val, $active = 'active')
{
    $query = Request::query($key);
    if (is_numeric($query)) {
        $query = (int)$query;
    }
    if ($query === $val) {
        return ' ' . $active;
    }
}