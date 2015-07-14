<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-12 23:42
 */

namespace Vicens\Wechat;

use Vicens\Wechat\Http\Request;
use Vicens\Wechat\Messages\BaseMessage;
use Vicens\Wechat\Utils\Bag;
use Vicens\Wechat\Utils\XML;

use Vicens\Wechat\Receive\Event;
use Vicens\Wechat\Receive\Recevie;

/**
 * 服务端
 */
class Wechat
{


    /**
     * 应用ID
     *
     * @var string
     */
    protected $appId;

    /**
     * token
     *
     * @var string
     */
    protected $token;

    /**
     * encodingAESKey
     *
     * @var string
     */
    protected $encodingAESKey;

    /**
     * 输入
     *
     * @var \Vicens\Wechat\Utils\Bag
     */
    protected $input;

    /**
     * 监听器
     *
     * @var \Vicens\Wechat\Utils\Bag
     */
    protected $listeners;

    /**
     * 是否为加密模式
     *
     * @var bool
     */
    protected $security = false;

    /**
     * 应用秘钥
     * @var string
     */
    protected $appSecret;

    /**
     * 允许的事件
     *
     * @var array
     */
    protected $events = array(
        'received',
        'served',
        'responseCreated',
    );


    protected $msgTypes = array(
        'event',
        'text',
        'image',
        'voice',
        'video',
        'shortvideo',
        'location',
        'link'
    );

    protected $receive  = array();


    /**
     * constructor
     *
     * @param string $appId
     * @param string $token
     * @param string $encodingAESKey
     * @param string $appSecret
     */
    public function __construct($appId, $token, $encodingAESKey = null, $appSecret = null)
    {

        $this->appId          = $appId;
        $this->token          = $token;
        $this->encodingAESKey = $encodingAESKey;
        $this->appSecret      = $appSecret;
        $this->request        = Request::createFromGlobals();

    }


    public function signature()
    {

        if ($this->request->getMethod() == 'GET' && $signature = $this->request->get('signature')) {
            $sign = $this->request->only('timestamp', 'nonce');
            $arr  = array($sign['timestamp'], $sign['nonce'], $this->token);
            sort($arr, SORT_STRING);
            if (sha1(implode($arr)) !== $signature) {
                throw new \Exception('TOKEN验证失败');
            }
        }

        return $this;
    }


    public function on($type, $class)
    {

        if (in_array($type, $this->msgTypes)) {
            return $this->{$type}($class);
        }
        throw new \Exception('不支持的类型：' . $type);

    }


    public function event($class)
    {

        if (!is_subclass_of($class, Event::class)) {
            throw new \Exception($class . '没有继承' . Event::class);

        }
        $this->receive['event'] = $class;

    }


    public function response()
    {

        dd($this->request->xml());
        $msgType = $this->request->get('MsgType');
        if (in_array($msgType, $this->receive)) {

            $object = new $this->receive[$msgType]($this->request->xml());

            return $object->response();
        }

    }


    /**
     * 初始化POST请求数据
     *
     * @return Bag
     */
    protected function prepareInput()
    {

        if ($this->input instanceof Bag) {
            return;
        }

        $xmlInput = file_get_contents('php://input');

        $input = XML::parse($xmlInput);

        if (!empty( $_REQUEST['encrypt_type'] ) && $_REQUEST['encrypt_type'] === 'aes'
        ) {
            $this->security = true;

            $input = $this->getCrypt()->decryptMsg($_REQUEST['msg_signature'], $_REQUEST['nonce'],
                $_REQUEST['timestamp'], $xmlInput);
        }

        $this->input = new Bag(array_merge($_REQUEST, (array)$input));
    }


    /**
     * 获取Crypt服务
     *
     * @return Crypt
     */
    protected function getCrypt()
    {

        static $crypt;

        if (!$crypt) {
            if (empty( $this->encodingAESKey ) || empty( $this->token )) {
                throw new Exception("加密模式下 'encodingAESKey' 与 'token' 都不能为空！");
            }

            $crypt = new Crypt($this->appId, $this->token, $this->encodingAESKey);
        }

        return $crypt;
    }


    /**
     * 处理微信的请求
     *
     * @return mixed
     */
    protected function handleRequest()
    {

        dd($this->input);

        if ($this->input->has('MsgType') && $this->input->get('MsgType') === 'event') {

            return $this->handleEvent($this->input);

        } elseif ($this->input->has('MsgId')) {

            return $this->handleMessage($this->input);
        }

        return false;
    }


    /**
     * 处理消息
     *
     * @param Bag $message
     *
     * @return mixed
     */
    protected function handleMessage($message)
    {

        if (!is_null($response = $this->call('message.*', array($message)))) {
            return $response;
        }

        return $this->call("message.{$message['MsgType']}", array($message));
    }


    /**
     * 处理事件
     *
     * @param Bag $event
     *
     * @return mixed
     */
    protected function handleEvent($event)
    {

        if (!is_null($response = $this->call('event.*', array($event)))) {
            return $response;
        }

        $event['Event'] = strtolower($event['Event']);

        return $this->call("event.{$event['Event']}", array($event));
    }


    /**
     * 调用监听器
     *
     * @param string      $key
     * @param array       $args
     * @param string|null $default
     *
     * @return mixed
     */
    protected function call($key, $args, $default = null)
    {

        $handlers = (array)$this->listeners[$key];

        foreach ($handlers as $handler) {
            if (!is_callable($handler)) {
                continue;
            }

            $res = call_user_func_array($handler, $args);

            if (!empty( $res )) {
                return $res;
            }
        }

        return $default;
    }


    /**
     * 魔术调用
     *
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public function __call($method, $args)
    {

        if (in_array($method, $this->events, true)) {
            $callback = array_shift($args);

            is_callable($callback) && $this->listeners->set($method, $callback);

            return;
        }
    }


}
