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

interface QueryInterface
{
    /**
     * @abstract
     * @return int
     */
    function getRequestMethod();

    /**
     * @abstract
     * @param $id
     * @return void
     */
    function setHost($id);

    /**
     * @abstract
     * @return void
     */
    function getHost();

    /**
     * @abstract
     * @return void
     */
    function getRoute();

    /**
     * @abstract
     * @param $key
     * @param $value
     * @return void
     */
    function setParameter($key, $value);

    /**
     * @abstract
     * @return void
     */
    function getParameters();

    /**
     * @abstract
     * @param $response
     * @return void
     */
    function setResponse($response);

    /**
     * @abstract
     * @return void
     */
    function getResponse();

    /**
     * @abstract
     * @return void
     */
    function send();
}
