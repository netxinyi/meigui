<?php
/**
 * @author vision.shi@yunzhihui.com
 * Date: 2015-07-01 17:17
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
            $this->restService = App::make('rest');
        }

        return $this->restService;
    }

}