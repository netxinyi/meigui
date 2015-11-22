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

class User extends BaseModel implements AuthenticatableContract, CanResetPasswordContract
{


    //支持Auth的Trait
    use Authenticatable, CanResetPassword;

    /**
     * 表名
     *
     * @var string
     */
    protected $table = 'users';


    /**
     * 主键
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * 批量赋值白名单
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
        'mobile',
        'avatar',
        'sex',
        'birthday',
        'marital_status',
        'salary',
        'height',
        'education',
        'age',
        'province',
        'city',
        'area',
    ];

    /**
     * 隐藏项
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * 追加属性
     * @var array
     */
    protected $append = ['sex_lang'];


    /*
    |--------------------------------------------------------------------------
    | 调整器
    |--------------------------------------------------------------------------
    */

    /**
     * 密码调整器
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {

        if (Hash::needsRehash($password)) {

            $password = Hash::make($password);
        }

        $this->attributes['password'] = $password;


    }


    /**
     * 生日调整器
     *
     * @param $birthday
     */
    public function setBirthdayAttribute($birthday)
    {

        $this->attributes['birthday'] = $birthday;

    }

    /*
    |--------------------------------------------------------------------------
    | 访问器
    |--------------------------------------------------------------------------
    */

    /**
     * 头像-默认头像
     * @return string
     */
    public function getAvatarAttribute()
    {

        if (!$this->attributes['avatar']) {
            return asset('/assets/admin/img/default-avatar.jpg');
        }

        return asset('/uploads/avatar/' . $this->attributes['avatar']);
    }


    /**
     * 性别-文字
     * @return mixed
     */
    public function getSexLangAttribute()
    {

        return UserEnum::$sexForm[$this->attributes['sex']];
    }

    /*
    |--------------------------------------------------------------------------
    | 范围查询
    |--------------------------------------------------------------------------
    */
    public function scopeRecommended($query)
    {
        return $query->where('recommended', 1);
    }

    public function scopeMale($query)
    {
        return $query->where('sex', \App\Enum\User::SEX_MALE);
    }

    public function scopeFemale($query)
    {
        return $query->where('sex', \App\Enum\User::SEX_FEMALE);
    }
}
