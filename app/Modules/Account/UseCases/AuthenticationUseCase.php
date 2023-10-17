<?php

namespace App\Modules\Account\UseCases;

use App\Modules\Account\Contracts\Authentication\AuthenticationUseCaseContract;
use App\Modules\Account\DataTransferObjects\Authentication\AuthorizationDto;

readonly class AuthenticationUseCase implements AuthenticationUseCaseContract
{

    public function authorization(AuthorizationDto $authorization)
    {
        // TODO: Implement authorization() method.
    }

    public function refreshToken()
    {
        // TODO: Implement refreshToken() method.
    }

    public function logout(string $accessId)
    {
        // TODO: Implement logout() method.
    }
}
