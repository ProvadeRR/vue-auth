<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterFormRequest;
use App\Http\Resources\UserResource;
use App\Repository\UserRepository;
use App\Services\TokenService;
use Illuminate\Http\Response;

class RegisterController extends Controller
{


    /**
     * @param RegisterFormRequest $request
     * @param UserRepository $userRepository
     * @param TokenService $tokenService
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(RegisterFormRequest $request, UserRepository $userRepository, TokenService $tokenService)
    {
        $userRegisterDto = $request->getDto();
        $user = $userRepository->createUser($userRegisterDto);
        $token = $tokenService->createToken($user);
        $data = [
            'user' => new UserResource($user),
            'token' => $token->accessToken,
            'token_type' => 'Bearer',
        ];

        return response()->json(['message' => 'Вы успешно зарегистрировались!', 'data' => $data], Response::HTTP_CREATED);
    }
}
