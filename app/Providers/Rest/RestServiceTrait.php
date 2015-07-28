<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-02 00:27
 */

namespace App\Providers\Rest;

use App;

trait RestServiceTrait
{


    /**
     * RestService实例
     * @var RestService
     */
    private $restService;


    /**
     * 返回RestService实例
     *
     * @return RestService
     */
    protected function rest()
    {

        if (is_null($this->restService)) {
            $this->restService = app('App\Providers\Rest\RestService');
        }

        return $this->restService;
    }

}