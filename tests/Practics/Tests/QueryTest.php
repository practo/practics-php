<?php

/*
 * This file is part of the Practics PHP API
 *
 * (c) 2011-2012 Practo.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Practics\Tests;

use Practics\Query\Query;

class GetQueryTest extends \PHPUnit_Framework_TestCase
{
    public function testPullQuery()
    {
        $query = new Query();
        $response = $query->pull("totalapp")
            ->setHost('default')
            ->setParameter('Date', '2011-07-27')
            ->setParameter('Practice', 1)
            ->send()
            ->getResponse();

        $expectedResponse = ""; //TODO: add the JSON expected response
        $this->assertEquals($expectedResponse, $response);
    }
}
