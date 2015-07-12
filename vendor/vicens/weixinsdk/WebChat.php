<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-12 17:58
 */

namespace Vicens\WebChat;

use Curl\Curl;
use Symfony\Component\HttpFoundation\Request;
use Vicens\WebChat\Exception\SignatureException;
use Symfony\Component\HttpFoundation\Response;
use Vicens\WebChat\Receive\Recevie;
use Vicens\WebChat\Receive\Text;

class WebChat
{


    protected $appId;

    protected $appSecret;

    protected $token;

    protected $encodingAesKey;

    private   $curl;

    protected $request;


    public function __construct(
        $option,
        $token = null,
        $encodingAesKey = null,
        $appSecret = null
    ){

        if (is_array($option)) {
            $this->appSecret      = $option['app_secret'];
            $this->appId          = $option['app_id'];
            $this->token          = $option['token'];
            $this->encodingAesKey = $option['encoding_aes_key'];
        } else {
            $this->appId          = $option;
            $this->token          = $token;
            $this->encodingAesKey = $encodingAesKey;
            $this->appSecret      = $appSecret;
        }
        $this->curl = new Curl();

        if ($echoStr = $this->signature()) {
            return $this->response($echoStr);
        }

    }


    /**
     * 获取request实例
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function getRequest()
    {

        if (is_null($this->request)) {
            $this->request = Request::createFromGlobals();
        }

        return $this->request;
    }


    protected function response($content)
    {

        return new Response($content);
    }


    /**
     * 验证签名是否合法
     * @return mixed
     * @throws \Vicens\WebChat\Exception\SignatureException
     */
    private function signature()
    {

        if ($signature = $this->getRequest()->get('signature')) {
            $sign = $this->request->only(['signature', 'timestamp', 'nonce']);
            sort($sign, SORT_STRING);
            if ($signature !== sha1(implode($sign))) {
                throw new SignatureException('Bad Request!', 400);
            }

            return $this->getRequest()->get('echostr');
        }
    }


    protected function recevie($type, $class)
    {


    }


    public function text($class)
    {

    }
}