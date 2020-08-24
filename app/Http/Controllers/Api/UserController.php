<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use app\Repositories\UserRepository\UserRepositoryInterface;
use Exception;
use App\Http\Controllers\Api\BaseAPIController;

class UserController extends BaseAPIController
{
    protected $userRepository;

    public $loginAfterSingUp = true;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepo->getAllUser();
        
        return response()->json($users);
    }

    
    public function store(UserRequest $request)
    {
        try {
            $user = $this->userRepository->store($request);
            $user->profile()->create([]);

            if($this->loginAfterSingUp){
                return redirect()->action('AuthController@login', ['request'=>$request]);
            }

            return $this->responseSuccess($user, 'Register success!');
        } catch (Exception $ex) {
            return $this->responseError(500, $ex->getMessage());
        }
    }
}
