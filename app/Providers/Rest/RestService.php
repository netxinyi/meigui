<?php
/**
 * @author vision.shi@yunzhihui.com
 * Date: 2015-06-24 09:25
 */
namespace App\Providers\Rest;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Database\Eloquent\Model;

class RestService implements Arrayable, Jsonable
{


    /**
     * 请求实例
     * @var Request
     */
    protected $request;


    /**
     * 响应实例
     * @var Response
     */
    protected $response;

    /**
     * jsonp时的回调参数名
     * @var string
     */
    protected $callback = 'callback';


    /**
     * 响应的code
     * @var int
     */
    protected $code = 0;


    /**
     * 响应的消息
     * @var string
     */
    protected $message = '';


    /**
     * 响应的数据
     * @var array
     */
    protected $data = '';


    /**
     * 响应格式
     * @var string
     */
    protected $format = 'json';


    /**
     * 实例化,需要请求实例和响应实例
     *
     * @param Request  $request
     * @param Response $response
     */
    public function __construct(Request $request = null, Response $response = null)
    {

        is_null($request) || $this->setRequest($request);
        is_null($response) || $this->setResponse($response);

    }


    /**
     * 设置请求实例
     *
     * @param Request $request
     *
     * @return $this
     */
    public function setRequest(Request $request)
    {

        $this->request = $request;

        return $this;
    }


    /**
     * 获取请求实例
     *
     * @return  Request $request
     */
    public function getRequest()
    {

        return $this->request;
    }


    /**
     * 设置响应实例
     *
     * @param Response $response
     *
     * @return $this
     */
    public function setResponse(Response $response)
    {

        $this->response = $response;

        return $this;
    }


    /**
     * 获取响应实例
     *
     * @return Response
     */
    public function getResponse()
    {

        return $this->response;
    }


    /**获取响应code
     *
     * @return int
     */
    public function getCode()
    {

        return $this->code;
    }


    /**获取响应消息
     * @return string
     */
    public function getMessage()
    {

        return $this->message;
    }


    /**
     * 获取响应数据
     *
     * @return array
     */
    public function getData()
    {

        return $this->data;
    }


    /**
     * 设置响应code
     *
     * @param int $code
     *
     * @return $this
     */
    public function setCode($code)
    {

        $this->code = $code;

        return $this;
    }


    /**
     * 设置响应消息
     *
     * @param string $message
     *
     * @return $this
     */
    public function setMessage($message = '')
    {

        if (is_array($message)) {
            $message = head($message);
        }
        $this->message = $message;

        return $this;
    }


    /**
     * 设置响应数据
     *
     * @param array $data
     *
     * @return $this
     */
    public function setData($data = array())
    {

        if ($data instanceof Arrayable) {
            $data = $data->toArray();
        }
        $this->data = $data;

        return $this;
    }


    /**
     * 设置响应格式
     *
     * @param $format
     *
     * @return $this
     */
    public function setFormat($format)
    {

        $this->format = $format;

        return $this;
    }


    /**
     * 获取响应格式
     * @return string
     */
    public function getFormat()
    {

        return $this->format;
    }


    /**
     * 设置jsonp时的回调参数名
     *
     * @param $callback
     *
     * @return $this
     */
    public function setCallback($callback)
    {

        $this->callback = $callback;

        return $this;
    }


    /**
     * 从请求中获取jsonp时的回调参数值
     *
     * @return mixed
     */
    public function getCallback()
    {

        return $this->request->get($this->callback);
    }


    /**
     * 以客户端需求自动转换响应格式
     *
     * @param array       $data
     * @param string      $message
     * @param int         $code
     * @param null|string $format
     *
     * @return Response
     */
    public function make($data = array(), $message = '', $code = 0, $format = null)
    {

        !empty( $data ) && $this->setData($data);
        !empty( $message ) && $this->setMessage($message);
        $code && $this->setCode($code);
        !empty( $format ) && $this->setFormat($format);


        switch ($this->getFormat() ?: $this->request->format()) {
            case 'xml'  :
                return $this->response->make($this->toXML())->header('Content-Type', 'application/xml');
                break;
            case 'html':
                return $this->response->make($this->getMessage());
                break;
            case 'jsonp':

                $this->response->setCallback($this->getCallback());

            case 'json' :
            default:
                return $this->response->json($this->toArray());
                break;

        }
    }


    /**
     * 响应一个异常
     *
     * @param \Exception $exception
     * @param Array      $data
     * @param string     $format
     *
     * @return $this
     */
    public function exception(\Exception $exception, $data = array(), $format = null)
    {

        return $this->make($data, $exception->getMessage(), $exception->getCode(), $format);

    }


    /**
     * 响应一个验证失败的验证器
     *
     * @param Validator $validator
     * @param array     $data
     * @param Closure   $callback
     * @param int       $code
     * @param string    $format
     *
     * @return $this
     */
    public function validator(
        Validator $validator,
        $data = array(),
        Closure $callback = null,
        $code = 500,
        $format = null
    ){

        if (is_null($callback)) {
            $callback = array($this, 'validatorMessage');
        }

        $message = call_user_func($callback, $validator);

        return $this->make($data, $message, $code, $format);
    }


    /**
     * 获取验证器的错误消息
     *
     * @param Validator $validator
     *
     * @return array
     */
    protected function validatorMessage(Validator $validator)
    {

        return array_flatten($validator->errors()->getMessages());
    }


    /**
     * 响应一个Response实例
     *
     * @param Response $response
     * @param array    $data
     * @param int      $code
     * @param string   $format
     *
     * @return Response
     */
    public function response(Response $response, $data = array(), $code = 1000, $format = null)
    {

        return $this->make($data, $response->getContent(), $code, $format);
    }


    /**
     * 响应一个模型
     *
     * @param Model  $model
     * @param string $message
     * @param int    $code
     * @param null   $format
     *
     * @return Response
     */
    public function model(Model $model, $message = '', $code = 1000, $format = null)
    {

        return $this->make($model->toArray(), $message, $code, $format);
    }


    /**
     * 以HTML格式响应
     *
     * @param array  $data
     * @param string $message
     * @param int    $code
     *
     * @return Response
     */
    public function html($data = array(), $message = '', $code = 0)
    {

        return $this->make($data, $message, $code, 'html');
    }


    /**
     * 以json格式响应
     *
     * @param array  $data
     * @param string $message
     * @param int    $code
     *
     * @return Response
     */
    public function json($data = array(), $message = '', $code = 0)
    {

        return $this->make($data, $message, $code, 'json');

    }


    /**
     * 以xml格式响应
     *
     * @param array  $data
     * @param string $message
     * @param int    $code
     *
     * @return mixed
     */
    public function xml($data = array(), $message = '', $code = 0)
    {

        return $this->make($data, $message, $code, 'xml');

    }


    /**
     * 以jsonp格式响应
     *
     * @param array  $data
     * @param string $message
     * @param int    $code
     *
     * @return Response
     */
    public function jsonp($data = array(), $message = '', $code = 0)
    {

        return $this->make($data, $message, $code, 'jsonp');
    }


    /**
     * 响应一个成功的消息
     *
     * @param array  $data
     * @param string $message
     * @param int    $code
     *
     * @return Response
     */
    public function success($data = array(), $message = '', $code = 1000)
    {

        return $this->make($data, $message, $code);
    }


    /**
     * 响应一个失败的消息
     *
     * @param string $message
     * @param int    $code
     * @param array  $data
     *
     * @return Response
     */
    public function error($message = '', $code = 500, $data = array())
    {

        return $this->make($data, $message, $code);
    }


    /**
     * 生成响应内容格式XML
     *
     * @return mixed
     */
    public function toXML()
    {

        $data = $this->toArray();

        $xml = simplexml_load_string('<rest />');

        $xml->addChild('code', $data['code']);

        switch (gettype($data['msg'])) {
            case    'array' :
            case    'object':
                $xml->addChild('msg', head($data['msg']));
                break;
            default:
                $xml->addChild('msg', $data['msg']);
                break;
        }

        switch (gettype($data['data'])) {
            case    'array' :
            case    'object':
                $xml->addChild('data', '');
                $this->makeXML((array)$data['data'], $xml->data);
                break;
            default:
                $xml->addChild('data', $data['data']);
                break;
        }

        return $xml->saveXML();
    }


    /**
     * 创建XML元素
     *
     * @param      $data
     * @param null $xml
     */
    private function makeXML($data, $xml = null)
    {

        foreach ($data as $k => $v) {
            if (is_array($v)) {
                $x = $xml->addChild($k);
                $this->makeXML($v, $x);
            } else {
                $xml->addChild($k, $v);
            }
        }

    }


    /**
     * 转换成数组
     *
     * @return array
     */
    public function toArray()
    {

        return array(
            'code' => $this->getCode(),
            'msg'  => $this->getMessage(),
            'data' => $this->getData()
        );
    }


    /**
     * 转换成json格式
     *
     * @param int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {

        return json_decode($this->toArray(), $options);
    }
}