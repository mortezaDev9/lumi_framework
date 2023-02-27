<?php

declare(strict_types=1);

use App\Router;
use App\Controllers\HomeController;
use App\Controllers\UserController;

return function (Router $router) {
    $router->get('/home', [HomeController::class, 'index'])
    ->get('/users', [UserController::class, 'index'])
    ->get('/user', [UserController::class, 'show']);
    
    return $router;
};
