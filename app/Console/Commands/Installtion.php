<?php

namespace App\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use \Cache;

class Installtion extends Command implements SelfHandling
{


    protected $name        = "install";

    protected $description = "一键安装程序并配置";


    public function __construct()
    {

        parent::__construct();
    }


    public function handle()
    {

        $this->info('开始安装程序，请稍后...');
        //安装数据库
          $this->call('migrate');
        $this->info('数据库安装完成');
        //设置缓存
        Cache::forever('visits', 1);
        $this->info('基础配置完成');
    }
}
