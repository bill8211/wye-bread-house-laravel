@extends('layouts.admin')

@section('title', 'Registrar Movimiento de Inventario')

@section('page-title', 'Registrar Movimiento de Inventario')

@section('admin-content')
<div class="mx-auto max-w-3xl space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-lg font-semibold text-amber-950 dark:text-amber-200">
                Nuevo Movimiento
            </h2>
            <p class="mt-1 text-sm text-stone-600 dark:text-stone-300">
                Ajusta el stock registrando entradas (producción) o salidas (ventas, mermas).
            </p>
        </div>
        <a href="{{ route('admin.inventory.index') }}" 
            class="text-sm font-medium text-amber-700 hover:text-amber-900 dark:text-amber-400 dark:hover:text-amber-300">
            &larr; Volver al historial
        </a>
    </div>

    @if (session('error'))
    <div role="alert" class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800 dark:border-red-900 dark:bg-red-950 dark:text-red-200">
        {{ session('error') }}
    </div>
    @endif

    <div class="overflow-hidden rounded-xl border border-stone-200 bg-white shadow-sm dark:border-stone-700 dark:bg-stone-900">
        <form action="{{ route('admin.inventory.store') }}" method="POST" class="p-6 sm:p-8">
            @csrf

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                
                <!-- Producto -->
                <div class="sm:col-span-2">
                    <label for="product_id" class="mb-1 block text-sm font-medium text-stone-700 dark:text-stone-300">Producto <span class="text-red-500">*</span></label>
                    <select name="product_id" id="product_id" required
                        class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2.5 text-sm text-stone-900 outline-none transition placeholder:text-stone-400 focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100">
                        <option value="">Seleccione el producto...</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                {{ $product->name }} (Stock actual: {{ $product->stock }})
                            </option>
                        @endforeach
                    </select>
                    @error('product_id') <span class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                </div>

                <!-- Tipo de Movimiento -->
                <div>
                    <label for="type" class="mb-1 block text-sm font-medium text-stone-700 dark:text-stone-300">Tipo de Movimiento <span class="text-red-500">*</span></label>
                    <select name="type" id="type" required
                        class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2.5 text-sm text-stone-900 outline-none transition placeholder:text-stone-400 focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100">
                        <option value="Entrada" {{ old('type') == 'Entrada' ? 'selected' : '' }}>Entrada (+)</option>
                        <option value="Salida" {{ old('type') == 'Salida' ? 'selected' : '' }}>Salida (-)</option>
                    </select>
                    @error('type') <span class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                </div>

                <!-- Cantidad -->
                <div>
                    <label for="quantity" class="mb-1 block text-sm font-medium text-stone-700 dark:text-stone-300">Cantidad <span class="text-red-500">*</span></label>
                    <input type="number" name="quantity" id="quantity" min="1" value="{{ old('quantity') }}" required
                        class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2.5 text-sm text-stone-900 outline-none transition placeholder:text-stone-400 focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100">
                    @error('quantity') <span class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                </div>

                <!-- Motivo -->
                <div class="sm:col-span-2">
                    <label for="reason" class="mb-1 block text-sm font-medium text-stone-700 dark:text-stone-300">Motivo del ajuste <span class="text-red-500">*</span></label>
                    <input type="text" name="reason" id="reason" value="{{ old('reason') }}" placeholder="Ej. Lote de producción matutina, Venta en mostrador, Merma..." required
                        class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2.5 text-sm text-stone-900 outline-none transition placeholder:text-stone-400 focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100">
                    @error('reason') <span class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                </div>

            </div>

            <div class="mt-8 flex items-center justify-end gap-3 border-t border-stone-100 pt-5 dark:border-stone-700">
                <a href="{{ route('admin.inventory.index') }}"
                    class="rounded-lg px-4 py-2.5 text-sm font-medium text-stone-700 transition hover:bg-stone-100 dark:text-stone-300 dark:hover:bg-stone-800">
                    Cancelar
                </a>
                <button type="submit"
                    class="inline-flex items-center justify-center rounded-lg bg-amber-800 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-amber-900 focus:outline-none focus:ring-2 focus:ring-amber-700 focus:ring-offset-2 cursor-pointer">
                    Registrar Movimiento
                </button>
            </div>
        </form>
    </div>
</div>
@endsection