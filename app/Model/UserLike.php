<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/29 18:25
 */

namespace App\Model;


class UserLike extends BaseModel
{
    /**
     * 表名
     *
     * @var string
     */
    protected $table = 'user_likes';


    /**
     * 主键
     * @var string
     */
    protected $primaryKey = 'user_id';

    public $timestamps = false;

}