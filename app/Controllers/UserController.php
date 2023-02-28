<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Services\UserService;
use App\Repositories\UserRepo;

class UserController
{
    public function __construct(
        private UserRepo $repo,
        private UserService $service,
    )
    {
    }
    
    public function index(): View
    {
        $users = $this->repo->all();
        
        return view('users.index', ['users' => $users]);
    }
    
    public function show(int $id): View
    {
        $user = $this->repo->findById($id);
        
        return view('users.show', ['user' => $user]);
    }
    
    public function create(): View
    {
        return view('users.create');
    }
    
    public function store(): View
    {
        $this->service->create([
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ]);
        
        return view('index');
    }
}
