#!/usr/bin/php
<?php

require __DIR__ . '/vendor/autoload.php';

$loop = React\EventLoop\Factory::create();
$context = new React\ZMQ\Context($loop);

$sub = $context->getSocket(\ZMQ::SOCKET_SUB);
$sub->connect('tcp://127.0.0.1:5555');
$sub->subscribe('webird');
$sub->on('messages', function ($msg) {
    echo "Received: ". $msg[1] ." on channel: ". $msg[0] ."\n";
});

$loop->run();

// You should never reach this.
echo "Exited receiving server.";
