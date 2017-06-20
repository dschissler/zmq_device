#!/usr/bin/php
<?php

$sub = new ZMQSocket(new ZMQContext(), ZMQ::SOCKET_SUB);
$sub->connect("tcp://127.0.0.1:5555");
$sub->setSockOpt(ZMQ::SOCKOPT_SUBSCRIBE, 'webird');
$sub->setSockOpt(ZMQ::SOCKOPT_LINGER, 0);

while (true) {
    $msg = $sub->recvMulti(ZMQ::MODE_NOBLOCK);
    if ($msg === false) {
        usleep(10000);
        continue;
    }

    echo "Received: ". $msg[1] ." on channel: ". $msg[0] ."\n";
}

// You should never reach this.
echo "Exited receiving server.";
