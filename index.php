<?php

require __DIR__ . "/vendor/autoload.php";

use App\core\Application;

$app = new Application();

$app->router->get('/', function () {
    echo "got to home page";
});

$app->run();
