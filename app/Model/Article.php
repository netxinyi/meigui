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
        'user_id',
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

}