<?php

namespace App\Repositories\ProfileRepository;

interface ProfileRepositoryInterface
{
    public function show($profile);
    public function updateProfile($profile, $request);

}