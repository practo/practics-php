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

class QueryTest extends \PHPUnit_Framework_TestCase
{
    public function testInsertQuery()
    {
        $payload = array(
            'AppointmentId' => "1",
            'Subscription' => "1",
            'StartDate' => '2011-07-27 08:00:00',
            'EndDate' => '2011-07-27 09:00:00',
            'Doctor' => '2',
        );

        $query = new Query();
        $response = $query->insert('Appointment')
            ->setParameters(array(
                 'payload' => json_encode($payload),
            ))
            ->send()
            ->getResponse();

        $response = json_decode($response, true);

        $expectedResponse = array(
            'result' => 'success'
        );

        $this->assertEquals($expectedResponse, $response);
    }

    public function testPullQuery()
    {
        $query = new Query();
        $response = $query->pull("totalapp")
            ->setHost('default')
            ->setParameter('Date', '2011-07-27')
            ->setParameter('Practice', "1")
            ->send()
            ->getResponse();

        $response = json_decode($response, true);

        $expectedResponse = array(
            'Date:20110727' => array(
                'Date' => '20110727',
                'AppointmentCount' => "1"
            )
        );
        $this->assertEquals($expectedResponse, $response);
    }

    public function testRemoveQuery()
    {
        $payload = array(
            'AppointmentId' => "1",
            'Subscription' => "1",
            'StartDate' => '2011-07-27 08:00:00',
            'EndDate' => '2011-07-27 09:00:00',
            'Doctor' => '2',
        );

        $query = new Query();
        $response = $query->remove('Appointment')
            ->setParameters(array(
                 'payload' => json_encode($payload),
            ))
            ->send()
            ->getResponse();

        $response = json_decode($response, true);

        $expectedResponse = array(
            'result' => 'success'
        );

        $this->assertEquals($expectedResponse, $response);
    }
}
