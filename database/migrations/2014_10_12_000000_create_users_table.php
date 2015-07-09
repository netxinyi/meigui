<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enum\User as UserEnum;
use App\Model\User;

class CreateUsersTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table){

            $table->increments('user_id')->comment('会员ID');
            $table->string('user_name')->comment('昵称');
            $table->string('email')->unique()->comment('邮箱');
            $table->string('password', 60)->comment('密码');
            $table->string('mobile', 20)->unique()->comment('手机');
            $table->date('birthday')->comment('生日');
            $table->tinyInteger('age')->comment('年龄');
            $table->enum('sex', array_keys(UserEnum::$sexForm))->comment('性别');


            $table->string('province', 100)->nullable()->comment('省份');
            $table->string('city', 100)->nullable()->comment('城市');
            $table->string('area', 100)->nullable()->comment('区/县');

            $table->enum('marital_status', array_keys(UserEnum::$maritalForm))->nullable()->comment('婚姻状况');
            $table->enum('salary', array_keys(UserEnum::$salaryForm))->nullable()->comment('月收入');
            $table->tinyInteger('height')->nullable()->comment('身高');
            $table->enum('education', array_keys(UserEnum::$educationForm))->nullable()->comment('教育程度');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        $this->seedUsers();
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('users');
    }


    public function seedUsers()
    {

        User::create([
            'user_name' => '迁迁',
            'email'     => '521287718@qq.com',
            'password'  => '123456',
            'mobile'    => '17090025057',
            'birthday'  => '1993-08-10',
            'age'       => '23',
        ]);
    }
}
