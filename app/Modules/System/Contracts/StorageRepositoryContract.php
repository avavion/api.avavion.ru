<?php

namespace App\Modules\System\Contracts;

interface StorageRepositoryContract
{
    public function get(string $path, string $disk = 'local'): ?string;

    public function put(string $path, mixed $contents, array $options = [], string $disk = 'local'): bool;

    public function exists(string $path, string $disk = 'local'): bool;

    public function append(string $path, mixed $contents, string $disk = 'local'): bool;

    public function getFileSize(string $path, string $disk = 'local'): int;

    public function getFileUrl(string $path): string;
}
