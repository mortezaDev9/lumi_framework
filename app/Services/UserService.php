<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserService implements UserServiceInterface
{
    public function create(array $data)
    {
        return $this->query()->create([
            
        ]);
    }
    
    public function query(): Builder
    {
        return User::query();
    }
}
