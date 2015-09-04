<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 00:27
 */

namespace App\Model;


class Option extends BaseModel
{


    /**
     * 表名
     * @var string
     */
    protected $table = 'options';

    /**
     * 主键
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * 批量赋值白名单
     * @var array
     */
    protected $fillable = ['key', 'value'];

    /**
     * 时间维护
     * @var bool
     */
    public $timestamps = false;

    /**
     * 类型强制转换
     *
     * @var array
     */
    protected $casts = [
        'autoload' => 'boolean',
    ];


    /*
    |--------------------------------------------------------------------------
    | 范围查询
    |--------------------------------------------------------------------------
    */
    /**
     * 以配置名查询
     *
     * @param $query
     * @param $key
     *
     * @return mixed
     */
    public function scopeKey($query, $key)
    {

        return $query->where('key', $key);
    }


    /**
     * 以自动加载项查询
     *
     * @param      $query
     * @param bool $autoload
     *
     * @return mixed
     */
    public function scopeAutoload($query, $autoload = true)
    {

        return $query->where('autoload', $autoload);
    }


}