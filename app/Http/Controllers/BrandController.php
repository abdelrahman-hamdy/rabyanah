<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BrandController extends Controller
{
    public function index(): View
    {
        $brands = Brand::active()
            ->ordered()
            ->withCount(['products' => fn ($query) => $query->active()])
            ->get();

        return view('pages.brands.index', [
            'brands' => $brands,
        ]);
    }

    public function show(Request $request, Brand $brand): View
    {
        // Ensure the brand is active
        if (! $brand->active) {
            abort(404);
        }

        $query = $brand->products()
            ->with('category')
            ->active()
            ->ordered();

        // Search within brand
        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($categorySlug = $request->get('category')) {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $products = $query->paginate(12)->withQueryString();

        // Get categories for this brand's products
        $categories = $brand->products()
            ->active()
            ->with('category')
            ->get()
            ->pluck('category')
            ->filter()
            ->unique('id')
            ->sortBy('name');

        return view('pages.brands.show', [
            'brand' => $brand,
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
