<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('comments', function (Blueprint $table){

            $table->increments('comment_id')->comment('评论ID');
            $table->integer('article_id')->comment('文章ID');
            $table->integer('user_id')->comment('用户ID');
            $table->string('content')->comment('评论内容');
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

        Schema::dropIfExists('comments');
    }
}
