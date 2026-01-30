<?php

namespace App\Observers;

use App\Models\Brand;
use App\Services\CacheService;

class BrandObserver
{
    public function saved(Brand $brand): void
    {
        CacheService::clearBrandCache();
    }

    public function deleted(Brand $brand): void
    {
        CacheService::clearBrandCache();
    }
}
