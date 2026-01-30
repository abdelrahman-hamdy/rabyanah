<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CacheService;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(string $slug): View
    {
        $locale = app()->getLocale();

        // Category only - products handled by Livewire
        $category = CacheService::remember(
            [CacheService::TAG_CATEGORIES, "category_{$slug}"],
            "category_{$slug}_{$locale}",
            CacheService::TTL_WEEK,
            fn () => Category::where('slug', $slug)
                ->where('is_active', true)
                ->firstOrFail()
        );

        return view('pages.categories.show', [
            'category' => $category,
        ]);
    }
}
