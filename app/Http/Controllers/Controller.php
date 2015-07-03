<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Providers\Rest\RestServiceTrait;
use Illuminate\Http\Exception\HttpResponseException;


abstract class Controller extends BaseController
{


    use  RestServiceTrait;

    protected $viewPrefix;

    protected $request;


    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {

        $this->request = $request;


    }


    /**
     * 响应一个视图
     *
     * @param string $view
     * @param array  $data
     * @param array  $mergeData
     *
     * @return \Illuminate\View\View
     */
    public function view($view = null, array $data = array(), array $mergeData = array())
    {

        if (!is_null($view)) {
            //添加view前缀
            $view = str_finish($this->viewPrefix, '.').$view;
        }

        return view($view, $data, $mergeData);
    }


    /**
     * 使用验证器验证所有表单
     *
     * @param array $rules
     * @param array $messages
     * @param array $customAttributes
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validate(array $rules, array $messages = [], array $customAttributes = [])
    {

        $validator = app('Illuminate\Contracts\Validation\Factory')->make($this->request->all(), $rules, $messages,
            $customAttributes);

        if ($validator->fails()) {
            throw new HttpResponseException($this->error($validator->errors()->getMessages()));

        }

        return $validator;
    }


    /**
     * 响应失败消息
     *
     * @param string $message
     * @param null   $redirect
     * @param int    $code
     * @param array  $data
     *
     * @return $this|\App\Http\Controllers\Controller|\Illuminate\Contracts\Routing\ResponseFactory
     */
    protected function error($message = '', $redirect = null, $code = 500, $data = array())
    {

        return $this->success($message, $data, $redirect, $code);
    }


    /**
     * 响应成功消息
     *
     * @param string $message
     * @param array  $data
     * @param null   $redirect
     * @param int    $code
     *
     * @return $this|\Illuminate\Contracts\Routing\ResponseFactory
     */
    protected function success($message = '', $data = array(), $redirect = null, $code = 1000)
    {

        if ($this->request->ajax()) {
            return $this->rest()->make($data, $message, $code);
        }

        $message = is_array($message) ? $message : ['error' => $message];

        return $this->redirect()->to($redirect ?: app('Illuminate\Routing\UrlGenerator')->previous())->withInput()->withErrors($message);
    }


    /**
     * 返回一个redirect实例
     *
     * @param  string|null $to
     * @param  int         $status
     * @param  array       $headers
     * @param  bool        $secure
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    protected function redirect($to = null, $status = 302, $headers = [], $secure = null)
    {

        return redirect($to, $status, $headers, $secure);
    }
}
