<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(Request $request): View
    {
        $query = $request->get('q', '');
        $categorySlug = $request->get('category');

        $productsQuery = Product::with(['category'])
            ->active()
            ->ordered();

        // Search by keyword
        if ($query) {
            $productsQuery->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            });
        }

        // Filter by category
        if ($categorySlug) {
            $productsQuery->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $products = $productsQuery->paginate(12)->withQueryString();

        // Get all categories for filters
        $categories = Category::active()->ordered()->get();

        return view('pages.search', [
            'products' => $products,
            'categories' => $categories,
            'query' => $query,
        ]);
    }
}
