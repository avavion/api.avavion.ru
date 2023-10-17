<?php

namespace App\Modules\System\Contracts;

interface CacheRepositoryContract
{
    public function get(string $key): mixed;

    public function set(string $key, mixed $value, int $ttl = 10): bool;

    public function delete(string $key): bool;

    public function lockCache(string $key, callable $function): void;
}
