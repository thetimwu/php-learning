<?php

require_once __DIR__ . "./vendor/autoload.php";

use App\controllers\SiteController;
use App\controllers\AuthController;
use App\core\Application;

$app = new Application(__DIR__);

$app->router->get('/', 'homepage');

$app->router->get('/user', [SiteController::class, 'user']);

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'handleLogin']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->run();
