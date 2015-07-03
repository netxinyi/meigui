<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 00:27
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Rest\RestService;
use App\Providers\Rest\RestClient;

class RestServiceProvider extends ServiceProvider
{


    /**
     * 按需加载
     * @var bool
     */
    protected $defer = true;


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {


        $this->app->singleton('rest', RestService::class);

        $this->app->singleton('rest.client', RestClient::class);
    }


    public function providers()
    {

        return array('rest', 'rest.client');
    }


}
