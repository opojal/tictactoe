<?php

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../app/LittleKernel.php';
require __DIR__.'/../app/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$kernel = new LittleKernel('dev', true);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
