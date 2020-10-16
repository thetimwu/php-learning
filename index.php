<?php

require_once __DIR__ . "./vendor/autoload.php";

use App\core\Application;

$app = new Application(__DIR__);

$app->router->get('/', 'homepage');

$app->router->get('/user', 'user');

$app->run();
