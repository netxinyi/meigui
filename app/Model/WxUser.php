<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 14:29
 */

namespace App\Model;


class WxUser extends BaseModel
{


    /**
     * 表名
     * @var string
     */
    protected $table = 'wx_users';

    /**
     * 主键
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * 批量赋值白名单
     * @var array
     */
    protected $fillable = [
        'nickname',
        'openid',
        'avatar',
        'country',
        'province',
        'city',
        'subscribe_time',
        'remark',
        'groupid',
        'sex'
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

    public function scopeOpenid($query, $openid)
    {

        return $query->where('openid', $openid);
    }
}