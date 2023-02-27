<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UserRepo implements UserRepoInterface
{
    public function all(): Collection
    {
        return $this->query()->latest()->get();
    }
    
    public function findById(int $id): User
    {
        return $this->query()->findOrFail($id);
    }
    
    public function findByEmail(string $email): User
    {
        return $this->query()->whereEmail($email)->first();
    }
    
    public function query(): Builder
    {
        return User::query();
    }
}
