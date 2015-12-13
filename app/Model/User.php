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
    protected $append = ['house_lang', 'sex_lang', 'level_lang', 'age_lang', 'height_lang', 'age', 'education_lang', 'salary_lang', 'marriage_lang'];


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

    public function getUserNameAttribute()
    {
        return $this->attributes['user_name'] ?: "注册用户";
    }

    /**
     * 头像-默认头像
     * @return string
     */
    public function getAvatarAttribute()
    {

        if (!$this->attributes['avatar'] || !\File::exists(public_path() . '/uploads/avatar/' . $this->attributes['avatar'])) {
            if ($this->attributes['sex'] == UserEnum::SEX_FEMALE) {
                return asset('/assets/images/default-avatar-female.jpg');
            }
            return asset('/assets/images/default-avatar-male.jpg');
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

    /**
     * 住房情况-文字
     * @return mixed
     */
    public function getHouseLangAttribute()
    {

        return $this->getLang(UserEnum::$houseLang, 'house', '未填写');
    }

    public function getLevelLangAttribute()
    {
        return \App\Enum\User::$levelLang[$this->attributes['level']];
    }

    public function getAgeAttribute()
    {
        $birthday = strtotime($this->attributes['birthday']);
        $diff = time() - $birthday;

        return ceil($diff / 31536000);
    }

    public function getAgeLangAttribute()
    {
        return $this->getAgeAttribute() . '岁';
    }

    public function getHeightLangAttribute()
    {

        if (array_get($this->attributes, 'height')) {
            return $this->attributes['height'] . 'cm';
        }
        return '未填写';
    }

    public function getEducationLangAttribute()
    {
        return $this->getLang(UserEnum::$educationLang, 'education', '未填写');

    }

    public function getSalaryLangAttribute()
    {
        return $this->getLang(UserEnum::$salaryLang, 'salary', '未填写');
    }

    public function getMarriageLangAttribute()
    {

        return $this->getLang(UserEnum::$marriageLang, 'marriage', '未填写');
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

    public function scopeLevel($query, $level = \App\Enum\User::LEVEL_1)
    {
        return $query->where('level', $level);
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
        return $this->hasMany(UserRecommend::class, 'user_id', 'user_id');
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

    public function likeMe()
    {
        return $this->hasMany(UserLike::class, 'like_user_id', 'user_id');
    }
}
