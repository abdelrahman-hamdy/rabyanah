<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\CacheService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(Request $request): View
    {
        $locale = app()->getLocale();
        $query = $request->get('q', '');
        $categorySlug = $request->get('category');
        $page = $request->get('page', 1);

        // Cache search results for 1 day (shorter TTL for search)
        $searchHash = md5($query.$categorySlug.$page);
        $cacheKey = "search_{$searchHash}_{$locale}";

        $products = CacheService::remember(
            [CacheService::TAG_SEARCH],
            $cacheKey,
            CacheService::TTL_DAY,
            function () use ($query, $categorySlug) {
                $productsQuery = Product::with(['category'])
                    ->active()
                    ->ordered();

                if ($query) {
                    $productsQuery->where(function ($q) use ($query) {
                        $q->where('name', 'like', "%{$query}%")
                            ->orWhere('description', 'like', "%{$query}%");
                    });
                }

                if ($categorySlug) {
                    $productsQuery->whereHas('category', function ($q) use ($categorySlug) {
                        $q->where('slug', $categorySlug);
                    });
                }

                return $productsQuery->paginate(12)->withQueryString();
            }
        );

        $categories = CacheService::remember(
            [CacheService::TAG_CATEGORIES],
            "search_categories_{$locale}",
            CacheService::TTL_WEEK,
            fn () => Category::active()->ordered()->get()
        );

        return view('pages.search', [
            'products' => $products,
            'categories' => $categories,
            'query' => $query,
        ]);
    }
}
