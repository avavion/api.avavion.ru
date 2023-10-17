<?php

namespace App\Modules\System;

use App\Modules\System\Contracts\CacheRepositoryContract;
use App\Modules\System\Contracts\StorageRepositoryContract;
use App\Modules\System\Repositories\CacheRepository;
use App\Modules\System\Repositories\StorageRepository;
use Illuminate\Support\ServiceProvider;

class SystemServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(abstract: StorageRepositoryContract::class, concrete: StorageRepository::class);
        $this->app->bind(abstract: CacheRepositoryContract::class, concrete: CacheRepository::class);
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/Databases/Migrations');
    }
}
