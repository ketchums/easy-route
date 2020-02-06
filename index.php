<?php

use EasyRouter\EasyRouter;

include 'EasyRouter.php';

$router = new EasyRouter();

$router->addGet('/', [
    'controller' => 'TestController',
    'method' => 'invoke'
]);

$router->resolve();