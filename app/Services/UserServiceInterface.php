<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

interface UserServiceInterface
{
    public function create(array $data): User;
    
    public function query(): Builder;
}
