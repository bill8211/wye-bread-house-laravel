<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Consultamos productos activos con 10 o menos unidades, ordenados de menor a mayor stock
        $lowStockProducts = Product::where('is_active', true)
                                   ->where('stock', '<=', 10)
                                   ->orderBy('stock', 'asc')
                                   ->get();

        return view('admin.dashboard', compact('lowStockProducts'));
    }
}