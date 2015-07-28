<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-10 20:40
 */

namespace App\Model;


class Article extends BaseModel
{


    /**
     * 表名
     * @var string
     */
    protected $table = 'articles';

    /**
     * 主键ID
     * @var string
     */
    protected $primaryKey = 'article_id';


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
        'title',
        'column_id',
        'admin_id',
        'content'
    ];


    /*
    |--------------------------------------------------------------------------
    | 关系映射
    |--------------------------------------------------------------------------
    */

    /**
     * 与栏目表的一对一逆向关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function column()
    {

        return $this->belongsTo('App\Model\Column', 'column_id', 'column_id');
    }


    /**
     * 与管理员表的一对一逆向关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {

        return $this->belongsTo('App\Model\Admin', 'admin_id', 'admin_id');
    }


    /**
     * 与评论表的一对多关系
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {

        return $this->hasMany('App\Model\Comment', 'article_id', 'article_id');
    }

}