<?php

    require __DIR__ . '/vendor/autoload.php';

    echo "Eviction test\n";

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

    $connection->connect();

    if ($connection->isConnected() === true) {
        echo "connected\n";
    } else {
        echo "failed\n";
        exit;
    }

    $i = 0;

    $test_value = "1234567890";

    for ($j = 0; $j < 10; $j++) {
        $test_value .= $test_value;
    }

    do {
        $i++;
        echo "add key".$i."\n";
        $connection->set("key".$i,$test_value, "ex", 1000);
        for ($j = 1; $j <= $i; $j++) {
            if (!$connection->exists("key".$j)) {
                echo "Missing key".$j."\n";
                exit;
            }
        }

    } while(1);




