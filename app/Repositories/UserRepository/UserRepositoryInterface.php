<?php

namespace App\Repositories\UserRepository;

interface UserRepositoryInterface
{
    public function getTopUser();
    public function getAllUser();
}
