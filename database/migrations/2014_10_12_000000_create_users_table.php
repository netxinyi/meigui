<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enum\User as UserEnum;
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

            $table->increments('user_id');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('mobile', 20)->unique();
            $table->enum('sex', array_keys(UserEnum::$sexForm));
            $table->integer('prov_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('area_id')->nullable();
            $table->integer('home_prov_id')->nullable();
            $table->integer('home_city_id')->nullable();
            $table->integer('home_area_id')->nullable();
            $table->timestamp('birthday');
            $table->tinyInteger('age');
            $table->enum('marital_status', array_keys(UserEnum::$maritalForm))->nullable();
            $table->enum('salary', array_keys(UserEnum::$salaryForm))->nullable();
            $table->string('asset')->nullable();
            $table->double('height')->nullable();
            $table->enum('education', array_keys(UserEnum::$educationForm))->nullable();


            $table->string('occupation')->nullable();
            $table->rememberToken();
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

        Schema::dropIfExists('users');
    }
}
