<?php

declare(strict_types=1);

use App\View;

if (! function_exists('view')) {
    function view(string $view, array $data = []): View
    {
        return View::make($view, $data);
    }
}
