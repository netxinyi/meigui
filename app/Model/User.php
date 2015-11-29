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
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends BaseModel implements AuthenticatableContract, CanResetPasswordContract
{


    //支持Auth的Trait
    use Authenticatable, CanResetPassword, SoftDeletes;

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
     * 隐藏项
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * 追加属性
     * @var array
     */
    protected $append = ['sex_lang', 'age_lang', 'height_lang', 'age', 'education_lang', 'salary_lang'];

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

        return UserEnum::$sexLang[$this->attributes['sex']];
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

    public function getHeightFormatAttribute()
    {
        return $this->attributes['height'] . 'cm';
    }

    public function getEducationLangAttribute()
    {
        if ($this->attributes['education']) {
            return \App\Enum\User::$educationLang[$this->attributes['education']];
        }
    }

    public function getSalaryLangAttribute()
    {
        if ($this->attributes['salary']) {
            return \App\Enum\User::$salaryLang[$this->attributes['salary']];
        }
    }

    /*
    |--------------------------------------------------------------------------
    | 范围查询
    |--------------------------------------------------------------------------
    */

    public function scopeMale($query)
    {
        return $query->where('sex', \App\Enum\User::SEX_MALE);
    }

    public function scopeFemale($query)
    {
        return $query->where('sex', \App\Enum\User::SEX_FEMALE);
    }

    public function scopeStatus($query, $status = \App\Enum\User::STATUS_OK)
    {
        return $query->where('status', $status);
    }


    /*
   |--------------------------------------------------------------------------
   | 关系映射
   |--------------------------------------------------------------------------
   */

    public function info()
    {
        return $this->hasOne(UserInfo::class, 'user_id', 'user_id');
    }

    public function recommend()
    {
        return $this->belongsTo(UserRecommend::class, 'user_id', 'user_id');
    }

    public function object()
    {
        return $this->hasOne(UserObject::class, 'user_id', 'user_id');
    }

    public function gallery()
    {
        return $this->hasMany(UserGallery::class, 'user_id', 'user_id');
    }

    public function bind()
    {
        return $this->hasMany(UserBind::class, 'user_id', 'user_id');
    }

    public function like()
    {
        return $this->hasMany(UserLike::class, 'user_id', 'user_id');
    }
}
