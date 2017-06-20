#!/usr/bin/php
<?php

$ctx = new ZMQContext();

$pub = $ctx->getSocket(ZMQ::SOCKET_PUB);
$pub->connect("tcp://127.0.0.1:5554");
$pub->setSockOpt(ZMQ::SOCKOPT_LINGER, 0);

// This is required to prevent the "slow joiner" problem.
// I'm not sure if this is the correct value but if you value your hair then I recommend using
// and lease some delay time.  Also another way around this is to connect your socket before
// doing some slightly time consuming operations and then send the message after that operation.
usleep(5000);

$pub->sendMulti(['webird', 'hello there!'], ZMQ::MODE_NOBLOCK);
