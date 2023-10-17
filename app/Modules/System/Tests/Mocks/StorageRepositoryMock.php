<?php

namespace App\Modules\System\Tests\Mocks;

use App\Modules\System\Contracts\StorageRepositoryContract;
use Illuminate\Support\Facades\Storage;

readonly class StorageRepositoryMock implements StorageRepositoryContract
{

    public function get(string $path, string $disk = 'local'): ?string
    {
        return Storage::fake(disk: $disk)->get(path: $path);
    }

    public function put(string $path, mixed $contents, array $options = [], string $disk = 'local'): bool
    {
        return Storage::fake(disk: $disk)->put(path: $path, contents: $contents, options: $options);
    }

    public function exists(string $path, string $disk = 'local'): bool
    {
        return Storage::fake(disk: $disk)->exists(path: $path);
    }

    public function append(string $path, mixed $contents, string $disk = 'local'): bool
    {
        return Storage::fake(disk: $disk)->append(path: $path, data: $contents);
    }

    public function getFileSize(string $path, string $disk = 'local'): int
    {
        return Storage::fake(disk: $disk)->size(path: $path);
    }

    public function getFileUrl(string $path): string
    {
        return url(Storage::url(path: $path));
    }
}
