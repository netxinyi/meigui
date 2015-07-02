<?php
/**
 * @author vision.shi@yunzhihui.com
 * Date: 2015-06-24 15:04
 */

namespace App\Providers\Rest;

class RestClient
{


	private $curl;

	protected $url;

	protected $data;

	protected $method;

	private $_cookies = array();
	private $_headers = array();


	private $response;

	private $error_no = 0;

	private $error_message;

	private $http_status_code;

	private $http_error;


	public function __construct(){

		if (!extension_loaded('curl')) {
			throw new \ErrorException('cURL library is not loaded');
		}

		$this->init();
	}

	public function __destruct(){
		$this->close();
	}

	public function init(){
		$this->curl = curl_init();
		return $this;
	}

	public function close(){
		if (is_resource($this->curl)) {
			curl_close($this->curl);
		}
	}

	public function getCurl(){
		return $this->curl;
	}

	public function setUrl($url){
		$this->url = $url;
		return $this;
	}

	public function setData($data = array()){
		$this->data = $data;
		return $this;
	}

	public function setCookie($name, $value =''){
		if(is_array($name)){
			foreach($name as $key=>$val){
				$this->_cookies[$key] = $val;
			}
		}else{
			$this->_cookies[$name] = $value;
		}
		return $this;

	}

	public function setHeader($name, $value='')
	{
		if(is_array($name)){
			foreach($name as $key=>$val){
				$this->_headers[] =$key.': '. $val;
			}
		}else{
			$this->_headers[] = $name.': '.$value;
		}
		return $this;
	}


	public function setMethod($method){
		$this->method = strtoupper($method);
		return $this;
	}
	public function setOpt($option, $value){
		
		curl_setOpt($this->curl, $option, $value);

		return $this;
	}

	public function setOptArray(array $options){
		curl_setopt_array($this->curl,$options);
		return $this;
	}

	public function  make($method,$url,$data = array(),$headers = array()){

		$this->setMethod($method)
			->setData($data)
			->setUrl($url)
			->setHeader($headers);

		return $this->exec();
	}

	protected function exec(){

		switch($this->method){
			case 'GET' :
				$this->setopt(CURLOPT_HTTPGET, true);
				break;
			case 'POST' :
				$this->setOptArray(array(
					CURLOPT_POST	=>	true,
					CURLOPT_POSTFIELDS => is_array($this->data) ? http_build_query($this->data) :$this->data
				));
				break;
			case 'PATCH' :
				$this->setOptArray(array(
					CURLOPT_CUSTOMREQUEST	=>	'PATCH',
					CURLOPT_POSTFIELDS => is_array($this->data) ? http_build_query($this->data) :$this->data
				));
				break;
            case 'PUT':
                $this->setOptArray(array(
                    CURLOPT_CUSTOMREQUEST	 =>	'PUT',
                    CURLOPT_POSTFIELDS => is_array($this->data) ? http_build_query($this->data) :$this->data
                ));
                break;
            case 'DELETE':
                $this->setOptArray(array(
                    CURLOPT_CUSTOMREQUEST	 =>	'DELETE',
                    CURLOPT_POSTFIELDS => is_array($this->data) ? http_build_query($this->data) :$this->data
                ));
                break;
			default:
				$this->setOpt(CURLOPT_CUSTOMREQUEST, $this->method);
				break;
		}

		$this->setOpt(CURLOPT_URL,$this->url);
		$this->setOpt(CURLOPT_HTTPHEADER,$this->_headers);
		$this->setOpt(CURLOPT_RETURNTRANSFER,true);
		$this->response = curl_exec($this->curl);

		$this->error_no = curl_errno($this->curl);
		$this->error_message = curl_error($this->curl);

		$this->http_status_code = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
		$this->http_error = in_array(floor($this->http_status_code / 100), array(4, 5));

		$this->close();
		return $this;
	}

	public function get($url, $data = array(),$headers = array())
	{
		if($data && is_array($data) ){
			$url = str_finish($url , '?') . http_build_query($data);
		}

		return $this->make('GET',$url,array(),$headers);

	}

	public function post($url, $data = array(),$headers = array())
	{

		return $this->make('POST',$url,$data,$headers);

	}

	public function put($url, $data = array(),$headers = array())
	{
		if($data && is_array($data) ){
			$url = str_finish($url , '?') . http_build_query($data);
		}

		return $this->make('PUT',$url,array(),$headers);


	}

	public function patch($url, $data = array(),$headers =array())
	{
		return $this->make('PATCH',$url,$data,$headers);
	}


	public function delete($url, $data = array(),$headers =array())
	{
		if($data && is_array($data) ){
			$url = str_finish($url , '?') . http_build_query($data);
		}

		return $this->make('DELETE',$url,array(),$headers);
	}


	public function isError(){
		return $this->error_no !== 0;
	}

	public function getErrorMessage(){
		return $this->error_message;
	}

	public function getHttpError(){
		return $this->http_error;
	}

	public function getStatus(){
		return $this->http_status_code;
	}

	public function getResponse(){
		return $this->response;
	}
	public function __toString(){

		return $this->getResponse();
	}

}