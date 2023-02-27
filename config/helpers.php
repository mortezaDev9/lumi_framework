<?php

declare(strict_types=1);

use App\View;

if (! function_exists('view')) {
    function view(string $name, array $data = []): View
    {
        return View::make($name, $data);
    }
}

if (! function_exists('public_path')) {
    function public_path(string $name): string
    {
        return __DIR__ . '/../public/' . $name;
    }
}
