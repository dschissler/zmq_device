#!/usr/bin/php
<?php

$ctx = new ZMQContext();

$sub = $ctx->getSocket(ZMQ::SOCKET_XSUB);
$sub->bind("tcp://127.0.0.1:5554");
$sub->setSockOpt(ZMQ::SOCKOPT_LINGER, 0);

$pub = $ctx->getSocket(ZMQ::SOCKET_XPUB);
$pub->bind("tcp://127.0.0.1:5555");
$pub->setSockOpt(ZMQ::SOCKOPT_LINGER, 0);

echo "The device server has been started.\n";

$device = new ZMQDevice($sub, $pub);
$device->run();

echo "Exited receiving server.";
