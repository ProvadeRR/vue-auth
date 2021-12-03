<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginFormRequest;
use App\Http\Resources\UserResource;
use App\Services\TokenService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * @param LoginFormRequest $request
     * @param TokenService $tokenService
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(LoginFormRequest $request, TokenService $tokenService)
    {
        if(!Auth::attempt($request->validated()))
            return response()->json(['message' => 'Неверные данные для входа'], Response::HTTP_UNPROCESSABLE_ENTITY);
        $user = auth()->user();
        $token = $tokenService->createToken($user);
        $data = [
            'user' => new UserResource($user),
            'token' => $token->accessToken,
            'token_type' => 'Bearer',
        ];
        return response()->json(['data' => $data],Response::HTTP_OK);

    }
}
