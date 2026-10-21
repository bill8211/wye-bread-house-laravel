@extends('layouts.admin')

@section('title', 'Editar producto')

@section('page-title', 'Editar producto')

@section('admin-content')
<div class="mx-auto max-w-3xl space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-lg font-semibold text-amber-950 dark:text-amber-200">
                Editar Producto: {{ $product->name }}
            </h2>
        </div>
        <a href="{{ route('admin.products.index') }}" 
            class="text-sm font-medium text-amber-700 hover:text-amber-900 dark:text-amber-400 dark:hover:text-amber-300">
            &larr; Volver al catálogo
        </a>
    </div>

    <div class="overflow-hidden rounded-xl border border-stone-200 bg-white shadow-sm dark:border-stone-700 dark:bg-stone-900">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <!-- Nombre -->
                <div class="sm:col-span-2">
                    <label for="name" class="mb-1 block text-sm font-medium text-stone-700 dark:text-stone-300">Nombre del producto <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                        class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2.5 text-sm text-stone-900 outline-none transition placeholder:text-stone-400 focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100">
                    @error('name') <span class="mt-1 text-xs text-red-600">{{ $message }}</span> @enderror
                </div>

                <!-- Categoría -->
                <div>
                    <label for="category_id" class="mb-1 block text-sm font-medium text-stone-700 dark:text-stone-300">Categoría <span class="text-red-500">*</span></label>
                    <select name="category_id" id="category_id" required
                        class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2.5 text-sm text-stone-900 outline-none transition placeholder:text-stone-400 focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100">
                        <option value="">Seleccione una categoría...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="mt-1 text-xs text-red-600">{{ $message }}</span> @enderror
                </div>

                <!-- Precio -->
                <div>
                    <label for="price" class="mb-1 block text-sm font-medium text-stone-700 dark:text-stone-300">Precio (Q) <span class="text-red-500">*</span></label>
                    <input type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price', $product->price) }}" required
                        class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2.5 text-sm text-stone-900 outline-none transition placeholder:text-stone-400 focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100">
                    @error('price') <span class="mt-1 text-xs text-red-600">{{ $message }}</span> @enderror
                </div>

                <!-- Stock -->
                <div>
                    <label for="stock" class="mb-1 block text-sm font-medium text-stone-700 dark:text-stone-300">Stock actual <span class="text-red-500">*</span></label>
                    <input type="number" name="stock" id="stock" min="0" value="{{ old('stock', $product->stock) }}" required
                        class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2.5 text-sm text-stone-900 outline-none transition placeholder:text-stone-400 focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100">
                    @error('stock') <span class="mt-1 text-xs text-red-600">{{ $message }}</span> @enderror
                </div>

                <!-- Estado -->
                <div>
                    <label for="is_active" class="mb-1 block text-sm font-medium text-stone-700 dark:text-stone-300">Estado <span class="text-red-500">*</span></label>
                    <select name="is_active" id="is_active" required
                        class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2.5 text-sm text-stone-900 outline-none transition placeholder:text-stone-400 focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100">
                        <option value="1" {{ old('is_active', $product->is_active) == '1' ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ old('is_active', $product->is_active) == '0' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('is_active') <span class="mt-1 text-xs text-red-600">{{ $message }}</span> @enderror
                </div>

                <!-- Descripción -->
                <div class="sm:col-span-2">
                    <label for="description" class="mb-1 block text-sm font-medium text-stone-700 dark:text-stone-300">Descripción (Opcional)</label>
                    <textarea name="description" id="description" rows="3"
                        class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2.5 text-sm text-stone-900 outline-none transition placeholder:text-stone-400 focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100">{{ old('description', $product->description) }}</textarea>
                    @error('description') <span class="mt-1 text-xs text-red-600">{{ $message }}</span> @enderror
                </div>

                <!-- Imagen -->
                <div class="sm:col-span-2 flex items-start gap-4">
                    @if($product->image_path)
                        <img src="{{ Storage::url($product->image_path) }}" alt="Imagen actual" class="h-20 w-20 rounded-lg object-cover border border-stone-200">
                    @endif
                    <div class="flex-1">
                        <label for="image" class="mb-1 block text-sm font-medium text-stone-700 dark:text-stone-300">Actualizar imagen (Opcional)</label>
                        <input type="file" name="image" id="image" accept="image/*"
                            class="block w-full text-sm text-stone-500 file:mr-4 file:rounded-lg file:border-0 file:bg-stone-100 file:px-4 file:py-2.5 file:text-sm file:font-semibold file:text-stone-700 hover:file:bg-stone-200 dark:text-stone-400 dark:file:bg-stone-800 dark:file:text-stone-300 cursor-pointer">
                        <p class="mt-1 text-xs text-stone-500">Dejar en blanco para conservar la imagen actual.</p>
                        @error('image') <span class="mt-1 text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Botones -->
            <div class="mt-8 flex items-center justify-end gap-3 border-t border-stone-100 pt-5 dark:border-stone-700">
                <a href="{{ route('admin.products.index') }}"
                    class="rounded-lg px-4 py-2.5 text-sm font-medium text-stone-700 transition hover:bg-stone-100 dark:text-stone-300 dark:hover:bg-stone-800">
                    Cancelar
                </a>
                <button type="submit"
                    class="inline-flex items-center justify-center rounded-lg bg-amber-800 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-amber-900 focus:outline-none focus:ring-2 focus:ring-amber-700 focus:ring-offset-2 cursor-pointer">
                    Actualizar producto
                </button>
            </div>
        </form>
    </div>
</div>
@endsection