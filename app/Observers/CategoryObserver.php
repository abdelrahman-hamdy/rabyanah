<?php

namespace App\Observers;

use App\Models\Category;
use App\Services\CacheService;

class CategoryObserver
{
    public function saved(Category $category): void
    {
        CacheService::clearCategoryCache($category->id);
    }

    public function deleted(Category $category): void
    {
        CacheService::clearCategoryCache($category->id);
    }
}
