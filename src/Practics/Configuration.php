<?php

/*
 * This file is part of the Practics PHP API
 *
 * (c) 2011-2012 Practo.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Practics;

class Configuration
{
    protected $hosts = array(
        'default' => 'http://localhost/',
    );
    protected $routes = array(
        'pull' => 'analytics',
        'insert' => 'resource',
        'delete' => 'resource',
    );

    public function getHost($id)
    {
        if (!isset($this->hosts[$id])) {
            throw new \Exception("Host `$id` not defined.");
        }
        return $this->hosts[$id];
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * set Host
     *
     * @param string $key - host key
     * @param string $url - full qualified url with http
     *
     * return null
     */
    public function setHost($key, $url)
    {
        $this->hosts[$key] = $url;

        return;
    }
}
