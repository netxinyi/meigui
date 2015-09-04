<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-11 08:59
 */

namespace App\Model;


class GuestBook extends BaseModel
{


    /**
     * 表名
     * @var string
     */
    protected $table = 'guestbook';

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
        'content',
        'user_id'
    ];


    /*
   |--------------------------------------------------------------------------
   | 关系映射
   |--------------------------------------------------------------------------
   */

    /**
     * 与用户表的一对一逆向关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {

        return $this->belongsTo('App\Model\User', 'user_id', 'user_id');
    }

}