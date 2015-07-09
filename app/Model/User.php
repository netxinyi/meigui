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
    | 范围查询
    |--------------------------------------------------------------------------
    */
    /**
     * 查询今天的用户
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeToday($query)
    {

        return $query->where('created_at', '>', date('Y-m-d 00:00:00', time()))->where('created_at', '<',
            date('Y-m-d 00:00:00', time() + 86400));
    }
}
