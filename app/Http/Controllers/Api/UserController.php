<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Repositories\UserRepository\UserRepositoryInterface;

class User extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $users = $this->userRepo->getAllUser();
        
        return response()->json($users);
    }
}
