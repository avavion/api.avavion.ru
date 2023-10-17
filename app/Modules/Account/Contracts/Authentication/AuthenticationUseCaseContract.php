<?php

namespace App\Modules\Account\Contracts\Authentication;

use App\Modules\Account\DataTransferObjects\Authentication\AuthorizationDto;

interface AuthenticationUseCaseContract
{
    public function authorization(AuthorizationDto $authorization);

    public function refreshToken();

    public function logout(string $accessId);
}
