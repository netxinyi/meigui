<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-10 20:38
 */

namespace App\Model;


class Column extends BaseModel
{


    /**
     * 表名
     * @var string
     */
    protected $table = 'columns';

    /**
     * 主键ID
     * @var string
     */
    protected $primaryKey = 'column_id';


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
        'column_name'
    ];


    /*
    |--------------------------------------------------------------------------
    | 关系映射
    |--------------------------------------------------------------------------
    */

    /**
     * 与文章的一对多关联
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {

        return $this->hasMany('App\Model\Article', 'column_id', 'column_id');
    }

}