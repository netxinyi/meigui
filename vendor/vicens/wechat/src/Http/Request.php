<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-12 22:48
 */

namespace Vicens\Wechat\Http;

use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Vicens\Wechat\Utils\XML;
use Vicens\Wechat\Utils\Arr;
use ArrayAccess;

class Request extends SymfonyRequest implements ArrayAccess
{


    /**
     * Retrieve a parameter item from a given source.
     *
     * @param  string $source
     * @param  string $key
     * @param  mixed  $default
     *
     * @return string|array
     */
    protected function retrieveItem($source, $key, $default)
    {

        if (is_null($key)) {
            return $this->$source->all();
        }

        return $this->$source->get($key, $default, true);
    }


    /**
     * Determine if the request contains a given input item key.
     *
     * @param  string|array $key
     *
     * @return bool
     */
    public function exists($key)
    {

        $keys = is_array($key) ? $key : func_get_args();

        $input = $this->all();

        foreach ($keys as $value) {
            if (!array_key_exists($value, $input)) {
                return false;
            }
        }

        return true;
    }


    /**
     * Determine if the request contains a non-empty value for an input item.
     *
     * @param  string|array $key
     *
     * @return bool
     */
    public function has($key)
    {

        $keys = is_array($key) ? $key : func_get_args();

        foreach ($keys as $value) {
            if ($this->isEmptyString($value)) {
                return false;
            }
        }

        return true;
    }


    /**
     * Determine if the given input key is an empty string for "has".
     *
     * @param  string $key
     *
     * @return bool
     */
    protected function isEmptyString($key)
    {

        $value = $this->input($key);

        $boolOrArray = is_bool($value) || is_array($value);

        return !$boolOrArray && trim((string)$value) === '';
    }


    /**
     * Get all of the input and files for the request.
     *
     * @return array
     */
    public function all()
    {

        return array_replace_recursive($this->input(), $this->files->all());
    }


    /**
     * Retrieve an input item from the request.
     *
     * @param  string $key
     * @param  mixed  $default
     *
     * @return string|array
     */
    public function input($key = null, $default = null)
    {

        $input = $this->getInputSource()->all() + $this->query->all();

        return Arr::get($input, $key, $default);
    }


    /**
     * Get a subset of the items from the input data.
     *
     * @param  array $keys
     *
     * @return array
     */
    public function only($keys)
    {

        $keys = is_array($keys) ? $keys : func_get_args();

        $results = [];

        $input = $this->all();

        foreach ($keys as $key) {
            Arr::set($results, $key, Arr::get($input, $key));
        }

        return $results;
    }


    /**
     * Get all of the input except for a specified array of items.
     *
     * @param  array $keys
     *
     * @return array
     */
    public function except($keys)
    {

        $keys = is_array($keys) ? $keys : func_get_args();

        $results = $this->all();

        Arr::forget($results, $keys);

        return $results;
    }


    /**
     * Retrieve a header from the request.
     *
     * @param  string $key
     * @param  mixed  $default
     *
     * @return string|array
     */
    public function header($key = null, $default = null)
    {

        return $this->retrieveItem('headers', $key, $default);
    }


    /**
     * Retrieve a server variable from the request.
     *
     * @param  string $key
     * @param  mixed  $default
     *
     * @return string|array
     */
    public function server($key = null, $default = null)
    {

        return $this->retrieveItem('server', $key, $default);
    }


    /**
     * Retrieve a query string item from the request.
     *
     * @param  string $key
     * @param  mixed  $default
     *
     * @return string|array
     */
    public function query($key = null, $default = null)
    {

        return $this->retrieveItem('query', $key, $default);
    }


    /**
     * Get the JSON payload for the request.
     *
     * @param  string $key
     * @param  mixed  $default
     *
     * @return mixed
     */
    public function json($key = null, $default = null)
    {

        if (!isset( $this->json )) {
            $this->json = new ParameterBag((array)json_decode($this->getContent(), true));
        }

        if (is_null($key)) {
            return $this->json;
        }

        return Arr::get($this->json->all(), $key, $default);
    }


    /**
     * Get the JSON payload for the request.
     *
     * @param  string $key
     * @param  mixed  $default
     *
     * @return mixed
     */
    public function xml($key = null, $default = null)
    {

        if (!isset( $this->xml )) {
            $this->xml = new ParameterBag((array)XML::parse($this->getContent()));
        }

        if (is_null($key)) {
            return $this->xml;
        }

        return Arr::get($this->xml->all(), $key, $default);
    }


    /**
     * Determine if the request is sending JSON.
     *
     * @return bool
     */
    public function isJson()
    {

        return preg_match('/\/json$/', $this->header('CONTENT_TYPE'));
    }


    /**
     * Determine if the request is sending XML.
     *
     * @return bool
     */
    public function isXml()
    {

        return preg_match('/\/xml$/', $this->header('CONTENT_TYPE'));
    }


    /**
     * Get the input source for the request.
     *
     * @return \Symfony\Component\HttpFoundation\ParameterBag
     */
    protected function getInputSource()
    {

        if ($this->isJson()) {
            return $this->json();
        }
        if ($this->isXml()) {
            return $this->xml();
        }

        return $this->getMethod() == 'GET' ? $this->query : $this->request;
    }


    /**
     * Determine if the given offset exists.
     *
     * @param  string $offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {

        return array_key_exists($offset, $this->all());
    }


    /**
     * Get the value at the given offset.
     *
     * @param  string $offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {

        return Arr::get($this->all(), $offset);
    }


    /**
     * Set the value at the given offset.
     *
     * @param  string $offset
     * @param  mixed  $value
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {

        return $this->getInputSource()->set($offset, $value);
    }


    /**
     * Remove the value at the given offset.
     *
     * @param  string $offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {

        return $this->getInputSource()->remove($offset);
    }


    /**
     * Get an input element from the request.
     *
     * @param  string $key
     *
     * @return mixed
     */
    public function __get($key)
    {

        $all = $this->all();

        if (array_key_exists($key, $all)) {
            return $all[$key];
        } else {
            return $this->route($key);
        }
    }
}