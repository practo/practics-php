Practics PHP API
================
This API helps you query the practics instance easily from your PHP application.

How to use the API
------------------

Use `git clone git@github.com:practo/practics-php.git` to get the latest source.

All configuration values are set in `src/Practics/Configuration.php`.

`Hosts` are the servers to which the API can connect. An instance of practics should be running on them.

`Routes` are the routes which the API will use to query. 

How to write a query
--------------------

Insert to `Appointment` resource.

``` php
<?php

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
```
Pull analytics for `totalapp`

``` php
<?php

$query = new Query();
$response = $query->pull("totalapp")
    ->setHost('default')
    ->setParameter('Date', '2011-07-27')
    ->setParameter('Practice', "1")
    ->send()
    ->getResponse();
```
Remove an appointment from the resource `Appointment`

``` php
<?php

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
```