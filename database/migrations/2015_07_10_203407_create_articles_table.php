<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('articles', function (Blueprint $table){

            $table->increments('article_id')->comment('文章ID');
            $table->integer('column_id')->comment('栏目ID');
            $table->string('title')->comment('文章标题');
            $table->text('content')->comment('文章内容');
            $table->integer('user_id')->comment('作者');
            $table->timestamps();

            $table->index(['column_id']);

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('articles');
    }
}
