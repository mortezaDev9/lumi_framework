<?php

declare(strict_types=1);

use App\Router;
use App\Application;
use Illuminate\Container\Container;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/path_constants.php';

$container = require CONFIG_PATH . '/container/container.php';
$router    = require_once __DIR__ . '/../routes/web.php';
$router    = $router(new Router($container));

// Set the $method and $uri to null so we can use CLI and don't get undefined array key error
$method = isset($_SERVER['REQUEST_METHOD']) ? strtolower($_SERVER['REQUEST_METHOD']) : null;
$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null;

$app = new Application(
    $container,
    $router,
    [
        'method' => $method,
        'uri'    => $uri
    ]
);

$app->boot();

return $app;
