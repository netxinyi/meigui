<?php

namespace App\Http\Controllers;


use Request;
use Illuminate\Routing\Controller as BaseController;
use App\Providers\Rest\RestServiceTrait;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Http\RedirectResponse;


abstract class Controller extends BaseController
{


    use  RestServiceTrait;

    /**
     * 模板所在目录
     * @var string
     */
    protected $viewPrefix;


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
            //添加view目录前缀
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

        $validator = app('Illuminate\Contracts\Validation\Factory')->make($this->request()->all(), $rules, $messages,
            $customAttributes);

        if ($validator->fails()) {

            throw new HttpResponseException($this->error($validator->errors()->getMessages()));
        }

        return $validator;
    }


    /**
     * 获取request实例
     * @return Request
     */
    protected function request()
    {

        return Request::instance();
    }


    /**
     * 响应失败消息
     *
     * @param string $message
     * @param int    $code
     * @param string|RedirectResponse $redirect
     * @param array  $data
     *
     * @return $this|\App\Http\Controllers\Controller|\Illuminate\Contracts\Routing\ResponseFactory
     */
    protected function error($message = '', $code = 500, $redirect = null, $data = array())
    {

        $message = is_array($message) ? $message : ['error' => $message];
        return $this->success($message, $data, $redirect, $code)->withInput();
    }


    /**
     * 响应成功消息
     *
     * @param string $message
     * @param array  $data
     * @param string|RedirectResponse $redirect
     * @param int    $code
     *
     * @return $this|\Illuminate\Contracts\Routing\ResponseFactory
     */
    protected function success($message = '', $data = array(), $redirect = null, $code = 1000)
    {

        if ($this->request()->ajax()) {
            return $this->rest()->make($data, $message, $code);
        }

        $message = is_array($message) ? $message : ['success' => $message];

        if (!$redirect instanceof RedirectResponse) {
            $redirect = $this->redirect()->to($redirect ?: app('Illuminate\Routing\UrlGenerator')->previous());
        }

        return $redirect->withErrors($message);
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
