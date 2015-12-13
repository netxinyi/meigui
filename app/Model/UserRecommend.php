<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/29 18:27
 */

namespace App\Model;


use App\Enum\User as UserEnum;

class UserRecommend extends BaseModel
{

    /**
     * 表名
     *
     * @var string
     */
    protected $table = 'user_recommend';
    public $timestamps = false;


    /**
     * 主键
     * @var string
     */
    protected $primaryKey = 'id';


    public function scopeIndex($query)
    {
        return $query->where('page', UserEnum::RECOMMEND_INDEX);
    }

    public function scopeHome($query)
    {
        return $query->where('page', UserEnum::RECOMMEND_HOME);
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}