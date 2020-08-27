<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseAPIController;
use Auth;
use App\Http\Requests\UserRequest;
use Exception;
use App\Models\User;

class AuthController extends BaseAPIController
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(UserRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (! $token = Auth::attempt($credentials)) {
            return $this->responseError(401, 'Unauthorized');
        }
        $profileId = Auth::user()->profile()->first()->id;
        $data = [
            'token' => $this->respondWithToken($token),
            'profileId' => $profileId
        ];

        return $this->responseSuccess($data, 'Login success!');
    }

    public function logout()
    {
        try {
            Auth::logout();

            return $this->responseSuccess([],'Successfully logged out');
        } catch (Exception $ex) {
            return $this->responseError(500, $ex->getMessage());
        }
    }

    public function me()
    {

        $userId = Auth::user()->id;

        return $this->responseSuccess($userId, 'Successfully');
    }

    public function refresh()
    {
        $tokenRefresh = Auth::refresh();

        return $this->responseSuccess($this->respondWithToken($tokenRefresh), 'Refresh token ok');
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}

