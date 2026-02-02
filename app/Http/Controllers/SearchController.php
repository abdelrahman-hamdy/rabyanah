<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(): View
    {
        // Livewire ProductGrid component handles search, filtering, and infinite scroll
        return view('pages.search');
    }
}
