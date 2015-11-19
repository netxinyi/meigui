<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Request;
use Illuminate\Routing\Controller as BaseController;
use App\Providers\Rest\RestServiceTrait;


abstract class Controller extends BaseController
{


    use  RestServiceTrait, ValidatesRequests;

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

        if (!is_null($this->viewPrefix)) {
            //添加view目录前缀
            $view = str_finish($this->viewPrefix, '.') . $view;
        }

        return view($view, $data, $mergeData);
    }


    /**
     * 响应失败消息
     *
     * @param string $message
     * @param int    $code
     * @param array  $data
     *
     * @return $this|\App\Http\Controllers\Controller|\Illuminate\Contracts\Routing\ResponseFactory
     */
    protected function error($message = '', $code = 500, $data = array())
    {

        return $this->success($message, $data, $code);
    }


    /**
     * 响应成功消息
     *
     * @param string $message
     * @param array  $data
     * @param int    $code
     *
     * @return $this|\Illuminate\Contracts\Routing\ResponseFactory
     */
    protected function success($message = '', $data = array(), $code = 1000)
    {

        return $this->rest()->make($data, $message, $code);
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


    /**
     * 获取request实例
     * @return Request
     */
    protected function request()
    {

        return Request::instance();
    }


    /**
     * 返回一个Response实例
     *
     * @param string $content
     * @param int    $status
     * @param array  $headers
     *
     * @return \Illuminate\Http\Response
     */
    protected function response($content = '', $status = 200, array $headers = [])
    {

        return response($content, $status, $headers);
    }


    /**
     * Create the response for when a request fails validation.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  array                    $errors
     *
     * @return \Illuminate\Http\Response
     */
    protected function buildFailedValidationResponse(\Illuminate\Http\Request $request, array $errors)
    {

        if ($request->ajax() || $request->wantsJson()) {
            return $this->error(head($errors), 422);
        }

        return $this->redirect($this->getRedirectUrl())->withInput($request->input())->withErrors($errors,
            $this->errorBag());
    }
}
