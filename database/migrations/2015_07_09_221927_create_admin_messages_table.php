<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Model\AdminMessage;

class CreateAdminMessagesTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('admin_messages', function (Blueprint $table){

            $table->increments('id');

            $table->integer('admin_id')->comment('管理员');

            $table->string('content')->comment('消息内容');

            $table->timestamps();
        });

        $this->seedMessage();
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('admin_messages');
    }


    public function seedMessage()
    {

        AdminMessage::create([
            'admin_id' => '1',
            'content'  => '欢迎您登录后台管理'
        ]);
    }
}
