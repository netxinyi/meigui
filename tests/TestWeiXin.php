<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-12 21:32
 */


use Curl\Curl;

class TestWeiXin extends TestCase
{


    public function testWeiXin()
    {

        $curl = new Curl();
        $a    = $curl->post('http://www.meigui.com/weixin/api', '<xml>
    <ToUserName><![CDATA[gh_204936aea56d]]></ToUserName>
    <FromUserName><![CDATA[ojpX_jig-gyi3_Q9fHXQ4rdHniQs]]></FromUserName>
    <CreateTime>1436707716</CreateTime>
    <MsgType><![CDATA[text]]></MsgType>
    <Content><![CDATA[?]]></Content>
    <MsgId>1234567890abcdef</MsgId>
</xml>');
        dd($a);
    }
}