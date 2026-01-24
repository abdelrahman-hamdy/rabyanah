<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(Request $request, string $slug): View
    {
        $category = Category::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $query = $category->products()
            ->with('brand')
            ->active()
            ->ordered();

        // Search within category
        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('name_ar', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('description_ar', 'like', "%{$search}%");
            });
        }

        // Filter by brand
        if ($brandId = $request->get('brand')) {
            $query->where('brand_id', $brandId);
        }

        $products = $query->paginate(12)->withQueryString();

        // Get brands in this category for filter
        $brands = $category->products()
            ->active()
            ->with('brand')
            ->get()
            ->pluck('brand')
            ->filter()
            ->unique('id')
            ->sortBy('name');

        return view('pages.categories.show', [
            'category' => $category,
            'products' => $products,
            'brands' => $brands,
        ]);
    }
}
