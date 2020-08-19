<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseAPIController;
use Auth;
use App\Http\Requests\UserRequest;
use Exception;

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

        return $this->responseSuccess($this->respondWithToken($token), 'Login success!');
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

    public function refresh()
    {
        $tokenRefresh = Auth::refresh();

        return $this->responseSuccess($this->respondWithToken($tokenRefresh));
    }

    public function me()
    {
        try {
            $user = Auth::user();

            return $this->responseSuccess($user);
        } catch (Exception $ex) {
            return $this->responseError(500, $ex->getMessage());
        }
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

