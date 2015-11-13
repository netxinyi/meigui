<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enum\User as UserEnum;

class CreateRegisterTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('register', function (Blueprint $table){

            $table->increments('id')->comment('会员ID');
            $table->string('realname')->comment('真实姓名');
            $table->string('mobile', 20)->unique()->comment('手机');
            $table->date('birthday')->comment('生日');
            $table->enum('sex', array_keys(UserEnum::$sexForm))->comment('性别');

            $table->enum('marital_status', array_keys(UserEnum::$maritalForm))->nullable()->comment('婚姻状况');

            $table->integer('user_id')->nullable()->comment("报名用户");
            $table->timestamps();
        });


    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('register');
    }
}
