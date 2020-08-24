<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseAPIController;
use App\Http\Requests\ProfileRequest;
use Exception;
use App\Models\Profile;
use Auth;

class ProfileController extends BaseAPIController
{
    public function show(Profile $profile)
    {
        return $this->responseSuccess($profile, 'Get profile of user');
    }

    public function update(ProfileRequest $request, Profile $profile)
    {
        try{
            $user = Auth::user();
            if($user->id === $profile->user_id) {
                $profile->update($request->all());
            } else {
                return $this->responseError(404, 'Invalid user');
            }

            return $this->responseSuccess($profile, 'Update profile success!');
        } catch (Exception $ex) {
            return $this->responseError(500, $ex->getMessage());
        }
    }

}
