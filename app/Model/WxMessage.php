<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 14:29
 */

namespace App\Model;


class WxMessage extends BaseModel
{


    /**
     * 表名
     * @var string
     */
    protected $table      = 'wx_messages';

    public    $timestamps = false;

    /**
     * 主键
     * @var string
     */
    protected $primaryKey = 'message_id';

    /**
     * 批量赋值白名单
     * @var array
     */
    protected $fillable = [
        'message_id',
        'type',
        'content',
        'user_id',
        'created_at',
        'wx_message_id'
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

    public function user()
    {

        return $this->belongsTo('App\\Model\\WxUser', 'user_id', 'user_id');
    }


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