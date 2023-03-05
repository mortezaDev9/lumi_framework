<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Services\UserServiceInterface;
use App\Repositories\UserRepositoryInterface;

class UserController
{
    public function __construct(
        private UserServiceInterface $service,
        private UserRepositoryInterface $repository
    )
    {
    }
    
    public function index(): View
    {
        $users = $this->repository->all();
        
        return view('users.index', ['users' => $users]);
    }
    
    public function show(int $id): View
    {
        $user = $this->repository->findById($id);
        
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
            'email'    => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12])
        ]);
        
        return view('index');
    }
}
