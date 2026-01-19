<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\HeroSlide;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $heroSlides = HeroSlide::active()
            ->ordered()
            ->get();

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
            ->take(12)
            ->get();

        $brands = Brand::active()
            ->ordered()
            ->take(12)
            ->get();

        return view('pages.home', compact(
            'heroSlides',
            'featuredProducts',
            'categories',
            'products',
            'brands'
        ));
    }
}
