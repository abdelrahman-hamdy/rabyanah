<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredProducts = Product::active()
            ->featured()
            ->with(['category'])
            ->ordered()
            ->take(9)
            ->get();

        $categories = Category::active()
            ->ordered()
            ->withCount('products')
            ->get();

        // Default: 8 recent products EXCLUDING featured
        $products = Product::active()
            ->where('is_featured', false)
            ->with(['category'])
            ->latest()
            ->take(8)
            ->get();

        $brands = Brand::active()
            ->orderBy('name')
            ->get();

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
        $cacheKey = "catalog_products_{$categorySlug}_" . app()->getLocale();

        $products = Cache::remember($cacheKey, 300, function () use ($categorySlug) {
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
        });

        $html = view('components.home.products-grid', compact('products'))->render();

        return response()->json([
            'html' => $html,
            'count' => $products->count(),
        ]);
    }
}
