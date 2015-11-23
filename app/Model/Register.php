<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 00:27
 */

namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Hash;
use App\Enum\User as UserEnum;

class Register extends BaseModel
{


    /**
     * 表名
     *
     * @var string
     */
    protected $table = 'register';


    /**
     * 主键
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * 批量赋值白名单
     *
     * @var array
     */
    protected $fillable = [
        'realname',
        'mobile',
        'sex',
        'birthday',
        'marital_status',
        'user_id'
    ];

    /**
     * 隐藏项
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * 追加属性
     * @var array
     */
    protected $append = ['sex_lang', 'age_format', 'age', 'marital_status_lang'];


    /*
    |--------------------------------------------------------------------------
    | 调整器
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | 访问器
    |--------------------------------------------------------------------------
    */


    /**
     * 性别-文字
     * @return mixed
     */
    public function getSexLangAttribute()
    {

        return UserEnum::$sexForm[$this->attributes['sex']];
    }

    public function getAgeAttribute()
    {
        $birthday = strtotime($this->attributes['birthday']);
        $diff = time() - $birthday;
        return floor($diff / 31536000);
    }

    public function getAgeFormatAttribute()
    {
        return $this->getAgeAttribute() . '岁';
    }


    public function getMaritalStatusLangAttribute()
    {
        return UserEnum::$maritalForm[$this->attributes['marital_status']];
    }

    /*
    |--------------------------------------------------------------------------
    | 范围查询
    |--------------------------------------------------------------------------
    */


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

}
