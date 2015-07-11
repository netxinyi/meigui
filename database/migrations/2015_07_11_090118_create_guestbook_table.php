<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enum\GuestBook as GuestBookEnum;

class CreateGuestbookTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('guestbook', function (Blueprint $table){

            $table->increments('message_id')->comment('留言ID');
            $table->integer('user_id')->comment('用户ID');
            $table->string('title')->comment('留言标题');
            $table->string('content')->comment('留言内容');
            $table->enum('status',
                array_keys(GuestBookEnum::$statusForm))->default(GuestBookEnum::STATUS_OK)->comment('留言状态');
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

        Schema::dropIfExists('guestbook');
    }
}
