<?php

/*
 * This file is part of the Practics PHP API
 *
 * (c) 2011-2012 Practo.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Practics\Query;

use \HttpRequest;

class GetQuery extends BaseQuery implements QueryInterface
{
    protected $id = null;
    protected $parameters = array();
    protected $response;
    protected $host;

    /**
     * @throws \Exception
     * @param $id
     */
    public function __construct($id)
    {
        if (!isset($id)) {
            throw new \Exception("No analytics ID specified.");
        }
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getRequestMethod()
    {
        return HttpRequest::METH_GET;
    }

    /**
     * @param $id
     * @return GetQuery
     */
    public function setHost($id)
    {
        $this->host = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param $key
     * @param $value
     * @return GetQuery
     */
    public function setParameter($key, $value)
    {
        $this->parameters[$key] = $value;
        return $this;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param $response
     * @return void
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @return String
     */
    public function getResponse()
    {
        return $this->response;
    }

    public function send()
    {
        $this->sendHttpRequest($this);
        return $this;
    }
}
