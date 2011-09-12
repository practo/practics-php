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
use Practics\Configuration;
use Practics\PracticsException;

class PullQuery extends BaseQuery implements QueryInterface
{
    protected $id = null;
    protected $parameters = array();
    protected $response;
    protected $host = 'default';
    protected $routeId = 'pull';

    /**
     * @throws \Practics\PracticsException
     * @param $id
     */
    public function __construct($id)
    {
        if (!isset($id)) {
            throw new PracticsException("No analytics ID specified.");
        }
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
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
     * @return PullQuery
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
     * @return string
     */
    public function getRoute()
    {
        return $this->routeId;
    }

    /**
     * @param $key
     * @param $value
     * @return PullQuery
     */
    public function setParameter($key, $value)
    {
        $this->parameters[$key] = $value;
        return $this;
    }

    /**
     * @param $key
     * @return string
     */
    public function getParameter($key)
    {
        return isset($this->parameters[$key]) ? $this->parameters[$key] : null;
    }

    /**
     * @param array $parameters
     * @return PullQuery
     */
    public function setParameters(array $parameters)
    {
        array_merge($this->parameters, $parameters);
        return $this;
    }

    /**
     * @return array
     */
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
