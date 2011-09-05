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
use Practics\Query\QueryInterface;

class BaseQuery
{
    protected $config;

    public function __construct()
    {
        $this->config = new Configuration();
    }

    /**
     * @param $id
     * @return string
     */
    protected function getHost($id)
    {
        $routes = $this->config->getRoutes();
        return isset($routes[$id]) ?: 'default';
    }

    /**
     * @throws \Exception
     * @param QueryInterface $query
     * @return string
     */
    protected function getUri(QueryInterface $query)
    {
        $routes = $this->config->getRoutes();
        if (HttpRequest::METH_GET === $query->getRequestMethod()) {
            return $this->config->getHost($query->getHost()).$routes['GET'];
        } elseif (HttpRequest::METH_POST === $query->getRequestMethod()) {
            return $this->config->getHost($query->getHost()).$routes['POST'];
        }

        throw new \Exception('Routes not defined.');
    }

    /**
     * @throws \HttpException
     * @param QueryInterface $query
     * @return QueryInterface
     */
    protected function sendHttpRequest(QueryInterface $query)
    {
        $request = new HttpRequest($this->getUri($query), $query->getRequestMethod());

        if (HttpRequest::METH_GET === $query->getRequestMethod()) {
            $request->addQueryData($query->getParameters());
        } elseif (HttpRequest::METH_POST === $query->getRequestMethod()) {
            $request->addPostFields($query->getParameters());
        }

        try {
            $request->send();
            if ($request->getResponseCode() == 200) {
                $query->setResponse($request->getResponseBody());
            }
        } catch (\HttpException $e) {
            throw $e;
        }

        return $query;
    }
}
