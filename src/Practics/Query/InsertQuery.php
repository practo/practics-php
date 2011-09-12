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
use Practics\PracticsException;

class InsertQuery extends BaseQuery implements QueryInterface
{
    protected $resourceId = null;
    protected $parameters = array('tr_type' => 'insert');
    protected $response;
    protected $host = 'default';
    protected $routeId = 'insert';

    /**
     * @throws \Practics\PracticsException
     * @param $resourceId
     */
    public function __construct($resourceId)
    {
        if (!isset($resourceId)) {
            throw new PracticsException("No resource ID specified.");
        }
        $this->resourceId = $resourceId;
    }

    /**
     * Here the Id is going to be the resource
     * @return string
     */
    public function getId()
    {
        return $this->resourceId;
    }

    /**
     * @return int
     */
    public function getRequestMethod()
    {
        return HttpRequest::METH_POST;
    }

    /**
     * @param $id
     * @return InsertQuery
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

    public function getRoute()
    {
        return $this->routeId;
    }

    /**
     * @param $key
     * @param $value
     * @return InsertQuery
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
     * @return InsertQuery
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = array_merge($this->parameters, $parameters);
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
