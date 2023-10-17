<?php

namespace App\Modules\Account\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Account\Contracts\Authentication\AuthenticationUseCaseContract;
use App\Modules\Account\DataTransferObjects\Authentication\AuthorizationDto;
use App\Modules\Account\Http\Requests\AuthorizationRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function __construct(
        private readonly AuthenticationUseCaseContract $authenticationUseCase,
    )
    {
    }

    public function authorization(AuthorizationRequest $request): JsonResponse
    {
        $authorizeTokens = $this->authenticationUseCase->authorization(
            authorization: new AuthorizationDto(
                email: $request->get('email'),
                password: $request->get('password')
            )
        );

        return $this->successResponse();
    }

    public function refreshToken(): JsonResponse
    {
        return $this->successResponse();
    }

    public function logout(): JsonResponse
    {
        $user = Auth::user();

        $isRevoked = $this->authenticationUseCase->logout(
            accessId: $user->getAccessToken()
        );

        return $this->successResponse([
            'is_revoked' => $isRevoked,
        ]);
    }
}
