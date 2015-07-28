<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnsTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('columns', function (Blueprint $table){

            $table->increments('column_id')->comment('栏目ID');
            $table->string('column_name')->comment('栏目名称');
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

        Schema::dropIfExists('columns');
    }
}
