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

    /**
     * @return \Practics\Configuration
     */
    public function getConfig()
    {
        return isset($this->config) ? $this->config : new Configuration();
    }

    /**
     * @param $id
     * @return string
     */
    protected function getHost($id)
    {
        return $this->getConfig()->getHost($id);
    }

    /**
     * @throws \Exception
     * @param QueryInterface $query
     * @return string
     */
    protected function getUri(QueryInterface $query)
    {
        $routes = $this->getConfig()->getRoutes();
        $id = $query->getId();
        if (HttpRequest::METH_GET === $query->getRequestMethod()) {
            return $this->getConfig()->getHost($query->getHost()).$routes[$query->getRoute()].'/'.$id.'/';
        } elseif (HttpRequest::METH_POST === $query->getRequestMethod()) {
            return $this->getConfig()->getHost($query->getHost()).$routes[$query->getRoute()].'/'.$id.'/';
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
