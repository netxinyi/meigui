<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-12 23:42
 */

namespace Vicens\Wechat;

use Vicens\Wechat\Http\Request;
use Vicens\Wechat\Messages\BaseMessage;
use Vicens\Wechat\Message;
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

        $msgType = $this->request->get('MsgType');
        if (in_array($msgType, $this->receive)) {

            $object = new $this->receive[$msgType]($this->request->xml());

            $response = $object->response();

            if ($response instanceof BaseMessage) {

                $return = $response->from($this->input->get('ToUserName'))->to($this->input->get('FromUserName'))->buildForReply();

                if ($this->security) {
                    $return = $this->getCrypt()->encryptMsg($return, $this->input->get('nonce'),
                        $this->input->get('timestamp'));
                }

                return $return;
            }

        }

    }




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





}
