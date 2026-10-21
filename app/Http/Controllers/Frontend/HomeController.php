<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // Cargamos las categorías y, para cada una, sus productos activos
        $categories = Category::with(['products' => function ($query) {
            $query->where('is_active', true);
        }])->get();

        return view('frontend.home', compact('categories'));
    }
}