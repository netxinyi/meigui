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


    use Authenticatable;

    protected $table      = 'admins';

    protected $primaryKey = 'admin_id';

    protected $fillable   = ['admin_name', 'admin_role', 'email', 'admin_pass', 'admin_status', 'admin_role'];

    //protected $hidden   = ['admin_pass'];


    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {

        return $this->admin_pass;
    }


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