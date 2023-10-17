<?php

namespace App\Modules\System\Repositories;

use App\Modules\System\Contracts\StorageRepositoryContract;
use Illuminate\Support\Facades\Storage;

readonly class StorageRepository implements StorageRepositoryContract
{
    public function get(string $path, string $disk = 'local'): ?string
    {
        return Storage::disk(name: $disk)->get(path: $path);
    }

    public function put(string $path, mixed $contents, array $options = [], string $disk = 'local'): bool
    {
        return Storage::disk(name: $disk)->put(path: $path, contents: $contents, options: $options);
    }

    public function exists(string $path, string $disk = 'local'): bool
    {
        return Storage::disk(name: $disk)->exists(path: $path);
    }

    public function append(string $path, mixed $contents, string $disk = 'local'): bool
    {
        return Storage::disk(name: $disk)->append(path: $path, data: $contents);
    }

    public function getFileSize(string $path, string $disk = 'local'): int
    {
        return Storage::disk(name: $disk)->size(path: $path);
    }

    public function getFileUrl(string $path): string
    {
        return url(Storage::url(path: $path));
    }
}
