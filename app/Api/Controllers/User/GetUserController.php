<?php

namespace App\Api\Controllers\User;

use App\Api\Controllers\Controller;
use App\Api\Resource\User\UserResource;
use App\Domain\Entity\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class GetUserController extends Controller
{
    /**
     * @var UserRepositoryInterface $userRepository
     */
    private UserRepositoryInterface $userRepository;

    /**
     * GetUserController constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        $users = $this->userRepository->all();

        return UserResource::collection($users);
    }
}
