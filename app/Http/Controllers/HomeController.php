<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\CacheService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $locale = app()->getLocale();

        $featuredProducts = CacheService::remember(
            [CacheService::TAG_HOME, CacheService::TAG_FEATURED],
            "home_featured_{$locale}",
            CacheService::TTL_WEEK,
            fn () => Product::active()
                ->featured()
                ->with(['category'])
                ->ordered()
                ->take(9)
                ->get()
        );

        $categories = CacheService::remember(
            [CacheService::TAG_HOME, CacheService::TAG_CATEGORIES],
            "home_categories_{$locale}",
            CacheService::TTL_WEEK,
            fn () => Category::active()
                ->ordered()
                ->withCount('products')
                ->get()
        );

        $products = CacheService::remember(
            [CacheService::TAG_HOME, CacheService::TAG_PRODUCTS],
            "home_products_{$locale}",
            CacheService::TTL_WEEK,
            fn () => Product::active()
                ->where('is_featured', false)
                ->with(['category'])
                ->latest()
                ->take(8)
                ->get()
        );

        $brands = CacheService::remember(
            [CacheService::TAG_HOME, CacheService::TAG_BRANDS],
            "home_brands_{$locale}",
            CacheService::TTL_WEEK,
            fn () => Brand::active()
                ->orderBy('name')
                ->get()
        );

        return view('pages.home', compact(
            'featuredProducts',
            'categories',
            'products',
            'brands'
        ));
    }

    public function catalogProducts(Request $request): JsonResponse
    {
        $categorySlug = $request->get('category', 'all');
        $locale = app()->getLocale();
        $cacheKey = "catalog_products_{$categorySlug}_{$locale}";

        $products = CacheService::remember(
            [CacheService::TAG_HOME, CacheService::TAG_PRODUCTS],
            $cacheKey,
            CacheService::TTL_WEEK,
            function () use ($categorySlug) {
                $query = Product::active()
                    ->with(['category:id,name,name_ar,slug'])
                    ->latest()
                    ->take(8);

                if ($categorySlug === 'all') {
                    $query->where('is_featured', false);
                } else {
                    $query->whereHas('category', fn ($q) => $q->where('slug', $categorySlug));
                }

                return $query->get();
            }
        );

        $html = view('components.home.products-grid', compact('products'))->render();

        return response()->json([
            'html' => $html,
            'count' => $products->count(),
        ]);
    }
}
