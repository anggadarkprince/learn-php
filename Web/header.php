<?php

// send http response header, specification http must define before content
header('Application: Learn PHP Web');
header('Author: Angga Ari Wijaya');

// Client-Name => HTTP_CLIENT_NAME
// header from client available in $_SERVER variable
// uppercase, and add prefix HTTP, dash become underscore
$client = $_SERVER['HTTP_CLIENT_NAME'];

echo "Hello $client";