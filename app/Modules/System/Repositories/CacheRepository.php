<?php

namespace App\Modules\System\Repositories;

use App\Modules\System\Contracts\CacheRepositoryContract;
use Illuminate\Support\Facades\Cache;

readonly class CacheRepository implements CacheRepositoryContract
{
    public function set(string $key, mixed $value, int $ttl = 900): bool
    {
        return Cache::set(key: $key, value: $value, ttl: $ttl);
    }

    public function delete(string $key): bool
    {
        return Cache::delete(key: $key);
    }

    public function lockCache(string $key, callable $function, int $lockTime = 5): void
    {
        $lock = Cache::lock(
            name: $key,
            seconds: $lockTime
        );

        if ($lock->get()) {
            $function();

            $lock->release();
        }
    }

    public function get(string $key): mixed
    {
        return Cache::get(key: $key);
    }
}
