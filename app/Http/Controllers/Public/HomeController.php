<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // Obtener las categorías con sus productos activos.
        $categories = Category::query()
            ->with(['products' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('name');
            }])
            ->orderBy('id')
            ->get();

        // Obtener los seis productos activos más recientes.
        $featuredProducts = Product::query()
            ->with('category')
            ->where('is_active', true)
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact(
            'categories',
            'featuredProducts'
        ));
    }
}