<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 00:27
 */

namespace App\Model;


class Scase extends BaseModel
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'case';


    protected $primaryKey = 'case_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];


    public function male()
    {
        return $this->belongsTo(User::class, 'male_id', 'user_id');
    }
    public function female()
    {
        return $this->belongsTo(User::class, 'female_id', 'user_id');
    }

}
