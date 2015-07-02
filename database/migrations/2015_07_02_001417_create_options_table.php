<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Model\Option;

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
            $table->string('key', '100')->comment('配置名');
            $table->string('value')->nullable()->comment('配置值');

            $table->unique(['key']);


            $table->engine = 'MyISAM';

        });

        $this->seedDefaultOptions();
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


    public function seedDefaultOptions(){

        Option::create([
            [
                'key'   =>  'site_name',
                'value' =>   '',
            ],
            [
                'key'   =>  'site_keywords',
                'value' =>  ''
            ],
            [
                'key'   =>  'site_description',
                'value' =>  ''
            ]
        ]);
    }
}
