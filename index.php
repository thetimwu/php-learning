<?php

use App\controllers\SiteController;
use App\controllers\AuthController;
use App\core\Application;
use App\models\User;

require_once __DIR__ . "./vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'userClass' => User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'passwd' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(__DIR__, $config);

$app->router->get('/', 'homepage');

$app->router->get('/user', [SiteController::class, 'user']);

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->run();
