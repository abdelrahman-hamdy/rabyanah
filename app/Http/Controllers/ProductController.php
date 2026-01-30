<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\CacheService;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $locale = app()->getLocale();

        // Categories for hero section only - products handled by Livewire
        $categories = CacheService::remember(
            [CacheService::TAG_CATEGORIES],
            "products_categories_{$locale}",
            CacheService::TTL_WEEK,
            fn () => Category::active()
                ->ordered()
                ->withCount(['products' => fn ($q) => $q->active()])
                ->get()
        );

        return view('pages.products.index', [
            'categories' => $categories,
        ]);
    }

    public function show(string $slug): View
    {
        $locale = app()->getLocale();
        $cacheKey = "product_{$slug}_{$locale}";

        $product = CacheService::remember(
            [CacheService::TAG_PRODUCTS, "product_{$slug}"],
            $cacheKey,
            CacheService::TTL_WEEK,
            fn () => Product::with(['category'])
                ->where('slug', $slug)
                ->where('is_active', true)
                ->firstOrFail()
        );

        $relatedCacheKey = "product_related_{$product->id}_{$locale}";

        $relatedProducts = CacheService::remember(
            [CacheService::TAG_PRODUCTS],
            $relatedCacheKey,
            CacheService::TTL_WEEK,
            fn () => Product::with(['category'])
                ->where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->active()
                ->ordered()
                ->limit(4)
                ->get()
        );

        return view('pages.products.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
