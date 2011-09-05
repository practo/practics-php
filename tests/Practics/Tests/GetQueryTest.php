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
    public function testBasicGetQuery()
    {
        $query = new Query();
        $query->get("totalapp")
            ->setHost('default')
            ->setParameter('date', '20110728')
            ->setParameter('practice', 1)
            ->send()
            ->getResponse();
    }
}
