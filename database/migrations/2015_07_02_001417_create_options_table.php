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
            $table->string('key', 100)->comment('配置名');
            $table->string('value')->nullable()->comment('配置值');
            $table->unique(['key']);
            $table->index(['key']);


            $table->engine = 'MyISAM';

        });

        $this->seedOptions();

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


    public function seedOptions()
    {

        Option::create([
            'key' => 'site_name'
        ]);
        Option::create([
            'key' => 'site_url'
        ]);
        Option::create([
            'key' => 'site_keywords'
        ]);
        Option::create([
            'key' => 'site_description'
        ]);
        Option::create([
            'key' => 'site_icp'
        ]);
    }

}
