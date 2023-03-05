<?php

declare(strict_types=1);

use Illuminate\Container\Container;

$container = new Container();

$bindings = require __DIR__ . '/container_bindings.php';

$bindings($container);

return $container;
