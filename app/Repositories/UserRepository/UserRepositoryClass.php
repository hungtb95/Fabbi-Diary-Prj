<?php

namespace App\Repositories\UserRepository;


use App\Repositories\CommonRepository\BaseRepositoryClass;

class UserRepositoryClass extends BaseRepositoryClass implements UserRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function getTopUser()
    {
        return $this->model->select('name')->take(config('user.take_number'))->get();
    }

    public function getAllUser()
    {
        return $this->model->getAll();
    }

    public function store($request)
    {
        $userDetail = [
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        $user = $this->create($userDetail);

        return $user;
    }
}
