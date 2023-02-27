<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface UserRepoInterface
{
    public function all(): Collection;
    
    public function findById(int $id): User;
    
    public function findByEmail(string $email): User;
    
    public function query(): Builder;
}
