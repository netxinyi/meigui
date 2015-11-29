<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/29 18:27
 */

namespace App\Model;


use App\Enum\User;

class UserRecommend extends BaseModel
{

    /**
     * 表名
     *
     * @var string
     */
    protected $table = 'user_recommend';


    /**
     * 主键
     * @var string
     */
    protected $primaryKey = 'id';


    public function scopeIndex($query)
    {
        return $query->where('page', User::RECOMMEND_INDEX);
    }

    public function scopeHome($query)
    {
        return $query->where('page', User::RECOMMEND_HOME);
    }


    public function user()
    {
        return $this->hasMany(\App\Model\User::class, 'user_id', 'user_id');
    }
}