<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 00:27
 */

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        /*
        |--------------------------------------------------------------------------
        | 扩展Blade模板解析器
        |--------------------------------------------------------------------------
        */
        #扩展route函数用法
        Blade::extend(function ($view){

            return preg_replace('/(?<!\w)(\s*)@route(\s*\(.*\))/', '$1<?php echo route$2; ?>', $view);
        });

        #扩展url函数用法
        Blade::extend(function ($view){

            return preg_replace('/(?<!\w)(\s*)@url(\s*\(.*\))/', '$1<?php echo url$2; ?>', $view);
        });
        #扩展config函数用法
        Blade::extend(function ($view){

            return preg_replace('/(?<!\w)(\s*)@config(\s*\(.*\))/', '$1<?php echo config$2; ?>', $view);
        });
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
