<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models\User;

class UserController
{
    public function __construct(private User $user)
    {
    }
    
    public function index(): View
    {
        $users = User::all();
        
        return view('users.index', ['users' => $users]);
    }
}
