<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 00:27
 */

namespace App\Model;


class Option extends BaseModel
{


    protected $table      = 'options';

    protected $primaryKey = 'id';


    public function scopeKey($query, $key)
    {

        return $query->where('key', $key);
    }


    public function scopeAutoload($query, $autoload = true)
    {

        return $query->where('autoload', $autoload);
    }

}