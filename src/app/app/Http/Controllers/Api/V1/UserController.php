<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Users\UserRepositoryInterface;
use App\Http\Resources\UserResource;

use App\Traits\ResponseFormatTrait;

class UserController extends Controller
{
    use ResponseFormatTrait;

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request){
            
        return $this->sendResponse(UserResource::collection($this->userRepository->getAllUsers($request)), 'Users');
    }
}
