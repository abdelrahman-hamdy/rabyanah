<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredProducts = Product::active()
            ->featured()
            ->with(['category', 'brand'])
            ->ordered()
            ->take(9)
            ->get();

        $categories = Category::active()
            ->ordered()
            ->withCount('products')
            ->get();

        $products = Product::active()
            ->with(['category', 'brand'])
            ->ordered()
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
}
