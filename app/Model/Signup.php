<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 14:29
 */

namespace App\Model;


class Signup extends BaseModel
{


    /**
     * 表名
     * @var string
     */
    protected $table = 'register';

    /**
     * 主键
     * @var string
     */
    protected $primaryKey = 'id';

    public $timestamps = true;
    /**
     * 批量赋值白名单
     * @var array
     */
    protected $fillable = [
        'id',
        'realname',
        'mobile',
        'birthday',
        'sex',
        'marital_status',
        'user_id'
    ];



    /*
    |--------------------------------------------------------------------------
    | 调整器
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | 关系映射
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | 范围查询
    |--------------------------------------------------------------------------
    */


}