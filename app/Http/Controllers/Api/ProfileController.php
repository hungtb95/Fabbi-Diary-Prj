<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseAPIController;
use App\Http\Requests\ProfileRequest;
use Exception;
use App\Models\Profile;

class ProfileController extends BaseAPIController
{
    public function show(Profile $profile)
    {
        return $this->responseSuccess($profile, 'Get profile of user');
    }

    public function update(ProfileRequest $request, Profile $profile)
    {
        try{
            $profile->update($request->all());

            return $this->responseSuccess($profile, 'Update profile success!');
        } catch (Exception $ex) {
            return $this->responseError(500, $ex->getMessage());
        }
    }

}
