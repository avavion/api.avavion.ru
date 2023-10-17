<?php

namespace App\Modules\Account\DataTransferObjects\Authentication;

readonly class AuthorizationDto
{
    public function __construct(
        public string $email,
        public string $password,
    )
    {
    }
}
