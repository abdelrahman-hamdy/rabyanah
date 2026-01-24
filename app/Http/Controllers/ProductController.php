<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::with(['category', 'brand'])
            ->active()
            ->ordered();

        // Search
        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('name_ar', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('description_ar', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($categorySlug = $request->get('category')) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $categorySlug));
        }

        // Filter by brand
        if ($brandId = $request->get('brand')) {
            $query->where('brand_id', $brandId);
        }

        $products = $query->paginate(12)->withQueryString();

        $categories = Category::active()
            ->ordered()
            ->withCount(['products' => fn ($q) => $q->active()])
            ->get();

        $brands = Brand::active()
            ->orderBy('name')
            ->get();

        return view('pages.products.index', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }

    public function show(string $slug): View
    {
        $product = Product::with(['category', 'brand'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedProducts = Product::with(['category', 'brand'])
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->active()
            ->ordered()
            ->limit(4)
            ->get();

        return view('pages.products.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
