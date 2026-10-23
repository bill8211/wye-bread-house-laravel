<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InventoryMovement;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function index()
    {
        // Cargamos las relaciones product y user para evitar el problema de consultas N+1.
        // Ordenamos por ID descendente para tener los movimientos más recientes primero.
        $movements = InventoryMovement::with(['product', 'user'])
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('admin.inventory.index', compact('movements'));
    }

    public function create()
    {
        // Solo traemos los productos activos para evitar movimientos en productos descontinuados
        $products = Product::where('is_active', true)->orderBy('name')->get();
        return view('admin.inventory.create', compact('products'));
    }

    public function store(Request $request)
    {
        // 1. Validar los datos del formulario
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:Entrada,Salida',
            'quantity' => 'required|integer|min:1',
            'reason' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        // 2. Validar que haya stock suficiente si es una "Salida"
        if ($validated['type'] === 'Salida' && $product->stock < $validated['quantity']) {
            return back()->withInput()->with('error', "No hay suficiente stock. El stock actual de {$product->name} es de {$product->stock} unidades.");
        }

        // 3. Ejecutar la actualización dentro de una transacción segura
        DB::transaction(function () use ($validated, $product) {

            // A. Registrar el movimiento histórico
            InventoryMovement::create([
                'product_id' => $product->id,
                'user_id' => Auth::id(),
                'type' => $validated['type'],
                'quantity' => $validated['quantity'],
                'reason' => $validated['reason'],
                'created_at' => now(), // Lo inyectamos manualmente ya que $timestamps = false
            ]);

            // B. Actualizar matemáticamente el stock del producto
            if ($validated['type'] === 'Entrada') {
                $product->increment('stock', $validated['quantity']);
            } else {
                $product->decrement('stock', $validated['quantity']);
            }
        });

        // 4. Redirigir con éxito
        return redirect()->route('admin.inventory.index')
            ->with('success', 'El movimiento se ha registrado y el stock se ha actualizado correctamente.');
    }
}
