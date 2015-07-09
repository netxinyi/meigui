<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 14:29
 */

namespace App\Model;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class Admin extends BaseModel implements AuthenticatableContract
{


    //支持Auth的Trait
    use Authenticatable;

    /**
     * 表名
     * @var string
     */
    protected $table = 'admins';

    /**
     * 主键
     * @var string
     */
    protected $primaryKey = 'admin_id';

    /**
     * 批量赋值白名单
     * @var array
     */
    protected $fillable = [
        'admin_name',
        'admin_role',
        'email',
        'admin_pass',
        'admin_status'
    ];

    /**
     * 隐藏项
     * @var array
     */
    protected $hidden = ['admin_pass'];


    /*
    |--------------------------------------------------------------------------
    | Auth支持
    |--------------------------------------------------------------------------
    */

    /**
     * 获取密码
     *
     * @return string
     */
    public function getAuthPassword()
    {

        return $this->admin_pass;
    }

    /*
    |--------------------------------------------------------------------------
    | 访问器
    |--------------------------------------------------------------------------
    */

    /**
     * 用户头像
     * @return string
     */
    public function getAvatarAttribute()
    {

        if (!$this->attributes['avatar']) {
            return asset('/assets/admin/img/default-avatar.jpg');
        }
    }


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
    public function setAdminPassAttribute($password)
    {

        if (Hash::needsRehash($password)) {

            $password = Hash::make($password);
        }

        $this->attributes['admin_pass'] = $password;


    }

}