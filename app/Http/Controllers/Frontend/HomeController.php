<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // Traemos 5 productos activos al azar para mostrarlos como destacados
        $featuredProducts = \App\Models\Product::where('is_active', true)
            ->inRandomOrder()
            ->take(5)
            ->get();

        $categories = \App\Models\Category::with(['products' => function ($query) {
            $query->where('is_active', true);
        }])->get();

        return view('frontend.home', compact('categories', 'featuredProducts'));
    }
}
