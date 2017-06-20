#!/usr/bin/php
<?php

$ctx = new ZMQContext();

$pub = $ctx->getSocket(ZMQ::SOCKET_PUB);
$pub->connect("tcp://127.0.0.1:5554");
$pub->setSockOpt(ZMQ::SOCKOPT_LINGER, 0);

usleep(5000);

$pub->sendMulti(['webird', 'hello there!'], ZMQ::MODE_NOBLOCK);
