<?php

use EasyRouter\EasyRouter;

include 'EasyRouter.php';

$router = new EasyRouter();

$router->get('/', [
    'controller' => 'TestController',
    'method' => 'invoke'
]);

$router->resolve();