<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Providers\Rest\RestServiceTrait;

abstract class Controller extends BaseController
{


    use DispatchesJobs, ValidatesRequests, RestServiceTrait;


    /**
     * 获取 Request实例
     * @return Request
     */
    protected function request(){

        return Request::instance();
    }


    /**
     * 使用验证器验证所有表单
     * @param array $rules
     * @param array $messages
     * @param array $customAttributes
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validate(array $rules, array $messages = [], array $customAttributes = []){


        $request = $this->request();

        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages, $customAttributes);

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }
        return $validator;
    }
}
