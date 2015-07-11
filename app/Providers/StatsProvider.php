<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-10 23:27
 */

namespace App\Providers;

use App\Model\Option;
use Illuminate\Support\ServiceProvider;
use \Cache;

class StatsProvider extends ServiceProvider
{


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        //访问量+1
        //@TODO 应该只统计前台
        Cache::increment('visits');
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
