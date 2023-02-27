<?php

declare(strict_types=1);

use App\Router;
use Illuminate\Container\Container;
use App\Controllers\HomeController;
use App\Controllers\UserController;

return function (Container $container) {
    $router = new Router($container);
    
    $router->get('/home', [HomeController::class, 'index'])
    ->get('/users', [UserController::class, 'index'])
    ->get('/user', [UserController::class, 'show']);
    
    return $router;
};
