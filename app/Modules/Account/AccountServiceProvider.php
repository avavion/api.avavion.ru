<?php

namespace App\Modules\Account;

use App\Modules\Account\Contracts\Authentication\AuthenticationRepositoryContract;
use App\Modules\Account\Contracts\Authentication\AuthenticationServiceContract;
use App\Modules\Account\Contracts\Authentication\AuthenticationUseCaseContract;
use App\Modules\Account\Contracts\User\UserRepositoryContract;
use App\Modules\Account\Contracts\User\UserServiceContract;
use App\Modules\Account\Contracts\User\UserUseCaseContract;
use App\Modules\Account\Repositories\AuthenticationRepository;
use App\Modules\Account\Repositories\UserRepository;
use App\Modules\Account\Services\AuthenticationService;
use App\Modules\Account\Services\UserService;
use App\Modules\Account\UseCases\AuthenticationUseCase;
use App\Modules\Account\UseCases\UserUseCase;
use Illuminate\Support\ServiceProvider;

class AccountServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(abstract: AuthenticationUseCaseContract::class, concrete: AuthenticationUseCase::class);
        $this->app->bind(abstract: AuthenticationRepositoryContract::class, concrete: AuthenticationRepository::class);
        $this->app->bind(abstract: AuthenticationServiceContract::class, concrete: AuthenticationService::class);

        $this->app->bind(abstract: UserUseCaseContract::class, concrete: UserUseCase::class);
        $this->app->bind(abstract: UserRepositoryContract::class, concrete: UserRepository::class);
        $this->app->bind(abstract: UserServiceContract::class, concrete: UserService::class);
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/Databases/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/Configs/Account.php', 'account');
    }
}
