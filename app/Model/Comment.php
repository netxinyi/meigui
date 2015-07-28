<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-10 21:23
 */

namespace App\Model;


class Comment extends BaseModel
{


    /**
     * 表名
     * @var string
     */
    protected $table = 'comments';

    /**
     * 主键ID
     * @var string
     */
    protected $primaryKey = 'comment_id';


    /**
     * 时间维护
     * @var bool
     */
    public $timestamps = true;


    /**
     * 批量赋值白名单
     * @var array
     */
    protected $fillable = [
        'content',
        'user_id',
        'article_id'
    ];


    /*
    |--------------------------------------------------------------------------
    | 关系映射
    |--------------------------------------------------------------------------
    */

    /**
     * 与文章的一对一逆向关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {

        return $this->belongsTo('App\Model\Article', 'article_id', 'article_id');
    }


    /**
     * 与用户表的一对一逆向关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {

        return $this->belongsTo('App\Model\User', 'user_id', 'user_id');
    }
}