<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 14:29
 */

namespace App\Model;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Admin extends BaseModel implements AuthenticatableContract
{


    use Authenticatable;

    protected $table      = 'admins';

    protected $primaryKey = 'admin_id';

    protected $fillable   = ['admin_name', 'admin_role', 'email', 'password', 'admin_status', 'admin_role'];


}