<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 00:28
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

abstract class BaseModel extends Model
{


    /**
     * 查询今天的数据
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeToday(Builder $query)
    {

        return $query->whereBetween(static::CREATED_AT, [date('Y-m-d 00:00:00', time()), date('Y-m-d h:i:s', time())]);
    }


}