<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Cached public routes (7 days = 604800 seconds)
Route::middleware(['cache.response:604800'])->group(function () {
    // Home Page
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // About Page
    Route::get('/about', [AboutController::class, 'index'])->name('about');

    // Products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

    // Categories
    Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

    // Search (1 day cache = 86400 seconds)
    Route::get('/search', [SearchController::class, 'index'])->name('search')->withoutMiddleware(['cache.response:604800'])->middleware(['cache.response:86400']);
});

// Catalog Products API (no cache - random products on each request)
Route::get('/api/catalog-products', [HomeController::class, 'catalogProducts'])->name('api.catalog-products');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Language Switcher
Route::get('/locale/{locale}', function (string $locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }

    return back();
})->name('locale.switch');

// Sitemap Routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.index');
Route::get('/sitemap-pages.xml', [SitemapController::class, 'pages'])->name('sitemap.pages');
Route::get('/sitemap-products.xml', [SitemapController::class, 'products'])->name('sitemap.products');
Route::get('/sitemap-categories.xml', [SitemapController::class, 'categories'])->name('sitemap.categories');
