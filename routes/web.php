<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Contact Form
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Language Switcher
Route::get('/locale/{locale}', function (string $locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return back();
})->name('locale.switch');
