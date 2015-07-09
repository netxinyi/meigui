<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-09 22:24
 */

namespace App\Model;


class AdminMessage extends BaseModel
{


    /**
     * 表名
     * @var string
     */
    protected $table = 'admin_messages';

    /**
     * 主键
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * 批量赋值白名单
     * @var array
     */
    protected $fillable = [
        'admin_id',
        'content'
    ];


    /*
    |--------------------------------------------------------------------------
    |关系映射
    |--------------------------------------------------------------------------
    */
    /**
     * 与管理员表的关系---逆向从属关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {

        return $this->belongsTo('App\Model\Admin', 'admin_id', 'admin_id');
    }

}