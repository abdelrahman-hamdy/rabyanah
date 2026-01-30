<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CacheService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(Request $request, string $slug): View
    {
        $locale = app()->getLocale();
        $search = $request->get('search');
        $page = $request->get('page', 1);

        $category = CacheService::remember(
            [CacheService::TAG_CATEGORIES, "category_{$slug}"],
            "category_{$slug}_{$locale}",
            CacheService::TTL_WEEK,
            fn () => Category::where('slug', $slug)
                ->where('is_active', true)
                ->firstOrFail()
        );

        // Only cache when no search applied
        if (! $search) {
            $productsCacheKey = "category_{$slug}_products_{$page}_{$locale}";

            $products = CacheService::remember(
                [CacheService::TAG_CATEGORIES, CacheService::TAG_PRODUCTS, "category_{$slug}"],
                $productsCacheKey,
                CacheService::TTL_WEEK,
                fn () => $category->products()
                    ->active()
                    ->ordered()
                    ->paginate(12)
            );
        } else {
            $query = $category->products()
                ->active()
                ->ordered();

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('name_ar', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('description_ar', 'like', "%{$search}%");
            });

            $products = $query->paginate(12)->withQueryString();
        }

        return view('pages.categories.show', [
            'category' => $category,
            'products' => $products,
        ]);
    }
}
