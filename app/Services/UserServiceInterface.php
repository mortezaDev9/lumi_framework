<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;

interface UserServiceInterface
{
    public function create(array $data);
    
    public function query(): Builder;
}
