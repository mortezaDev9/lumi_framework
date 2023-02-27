<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Services\UserService;
use App\Repositories\UserRepo;

class UserController
{
    public function __construct(
        private UserService $service,
        private UserRepo $repo,
    )
    {
    }
    
    public function index(): View
    {
        $users = $this->repo->all();
        
        return view('users.index', ['users' => $users]);
    }
    
    public function show(): View
    {
        $user = $this->repo->findById(1);
        
        return view('users.show', ['user' => $user]);
    }
}
