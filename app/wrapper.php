<?php

require __DIR__ . '/vendor/autoload.php';

echo "Wrapper test\n";

$sentinels = [
    "tcp://host.docker.internal:26379",
];

$connection = new Predis\Client($sentinels, [
    'replication' => 'sentinel',
    'service' => 'mymaster',
    'parameters' => [
        'password' => 'str0ng_passw0rd',
    ]
]);

date_default_timezone_set("Europe/Kyiv");

$connection->connect();

if ($connection->isConnected() === true) {
    echo "connected\n";
} else {
    echo "failed\n";
    exit;
}

if (!$connection->exists("content")) {
    echo "Cache missing\n";
    echo "Taking data from DB\n";
    $connection->set("content", "some text", "ex", 30);
} else {
    $expiretime = $connection->expiretime("content");
    echo "Cache expire at ".date("H:i:s",$expiretime)."\n";
    $delta = $expiretime-time();
    echo "Time left ".$delta."s\n";
    if ($delta >= 10) {
        echo "Expire date more than 10s using data from cache\n";
    } else {
        echo "Expire date less than 10s\n";
        if (mt_rand(0,10) == 5) {
            echo "Using predictive cache\n";
            echo "Taking data from DB\n";
            $connection->set("content", "some text", "ex", 30);
        } else {
            echo "Using data from cache\n";
        }
    }
}




