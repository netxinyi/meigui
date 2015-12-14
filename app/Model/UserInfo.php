<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/29 18:25
 */

namespace App\Model;


class UserInfo extends BaseModel
{
    /**
     * 表名
     *
     * @var string
     */
    protected $table = 'user_info';


    /**
     * 主键
     * @var string
     */
    protected $primaryKey = 'user_id';

    public $timestamps = false;

    protected $appends = ['origin'];

    public function getStockAttribute()
    {
        return array_get($this->attributes, 'stroke', '未填写');

    }

    public function getOriginAttribute()
    {
        $pro = array_get($this->attributes, 'origin_province', '');
        $city = array_get($this->attributes, 'origin_city', '');

        return !$pro && !$city ? '未填写' : $pro . ' ' . $city;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

}