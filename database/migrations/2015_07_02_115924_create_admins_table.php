<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 11:59
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enum\Admin as AdminEnum;
use App\Model\Admin;

class CreateAdminsTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('admins', function (Blueprint $table){

            $table->increments('admin_id')->comment('管理员ID');
            $table->string('admin_name')->comment('管理员用户名');
            $table->char('admin_pass', 60)->comment('管理员密码');
            $table->string('avatar')->comment('头像');
            $table->enum('admin_status', [
                AdminEnum::STATUS_NORMAL,
                AdminEnum::STATUS_STOP,
            ])->default(AdminEnum::STATUS_NORMAL)->comment('管理员状态');
            $table->string('email', 100)->comment('管理员邮箱');
            $table->enum('admin_role', [
                AdminEnum::ROLE_SUPERADMIN,
                AdminEnum::ROLE_ADMIN
            ])->default(AdminEnum::ROLE_ADMIN);
            $table->rememberToken();
            $table->timestamps();
            $table->unique(['admin_name', 'email']);
        });

        $this->seedAdmin();
    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('admins');
    }


    public function seedAdmin()
    {

        Admin::create([
            'admin_name'   => '超级管理员',
            'admin_role'   => AdminEnum::ROLE_SUPERADMIN,
            'email'        => '521287718@qq.com',
            'admin_pass'   => '123456',
            'admin_status' => AdminEnum::STATUS_NORMAL,
        ]);
        Admin::create([
            'admin_name'   => 'admin',
            'admin_role'   => AdminEnum::ROLE_SUPERADMIN,
            'email'        => 'admin@admin.com',
            'admin_pass'   => '123456',
            'admin_status' => AdminEnum::STATUS_NORMAL,
        ]);
    }
}
