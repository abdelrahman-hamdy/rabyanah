<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\CacheService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $locale = app()->getLocale();
        $search = $request->get('search');
        $categorySlug = $request->get('category');
        $page = $request->get('page', 1);

        // Only cache when no search/filters applied
        if (! $search && ! $categorySlug) {
            $cacheKey = "products_index_{$page}_{$locale}";

            $products = CacheService::remember(
                [CacheService::TAG_PRODUCTS],
                $cacheKey,
                CacheService::TTL_WEEK,
                fn () => Product::with(['category'])
                    ->active()
                    ->ordered()
                    ->paginate(12)
            );
        } else {
            $query = Product::with(['category'])
                ->active()
                ->ordered();

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('name_ar', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhere('description_ar', 'like', "%{$search}%");
                });
            }

            if ($categorySlug) {
                $query->whereHas('category', fn ($q) => $q->where('slug', $categorySlug));
            }

            $products = $query->paginate(12)->withQueryString();
        }

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
            'products' => $products,
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
