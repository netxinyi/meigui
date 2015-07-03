<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Model\Option;
use App\Enum\Option as OptionEnum;

class CreateOptionsTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('options',function (Blueprint $table){

            $table->increments('id');
            $table->string('title', 100)->comment('配置标题');
            $table->string('code', 100)->comment('配置编码');
            $table->string('value')->nullable()->comment('配置值');
            $table->boolean('autoload')->default(false)->comment('自动加载');
            $table->enum('type', [
                OptionEnum::INPUT_TYPE_TEXT,
                OptionEnum::INPUT_TYPE_SELECT,
                OptionEnum::INPUT_TYPE_RADIO,
                OptionEnum::INPUT_TYPE_CHECKBOX,
                OptionEnum::INPUT_TYPE_TEXTAREA
            ])->default(OptionEnum::INPUT_TYPE_TEXT)->comment('录入方式');
            $table->string('values')->nullable()->comment('可选值列表');
            $table->string('desc')->nullable()->comment('配置项描述');

            $table->unique(['code']);
            $table->index(['code']);


            $table->engine = 'MyISAM';

        });


    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('options');
    }


}
