<?php

declare(strict_types=1);

use Illuminate\Container\Container;
use App\Services\UserService;
use App\Services\UserServiceInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;

return function (Container $container) {
    $container->bind(UserServiceInterface::class, UserService::class);
    $container->bind(UserRepositoryInterface::class, UserRepository::class);
};