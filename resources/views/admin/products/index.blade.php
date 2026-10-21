@extends('layouts.admin')

@section('title', 'Gestión de productos')

@section('page-title', 'Gestión de productos')

@section('admin-content')
<div class="space-y-6">

    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-lg font-semibold text-amber-950 dark:text-amber-200">
                Catálogo de productos
            </h2>

            <p class="mt-1 text-sm text-stone-600 dark:text-stone-300">
                Administra los productos de panadería, precios, existencias y estados.
            </p>
        </div>

        <!-- El enlace tiene un '#' temporalmente para evitar errores hasta que creemos la ruta -->
        <a href="{{ route('admin.products.create') }}"
            class="inline-flex items-center justify-center rounded-lg bg-amber-800 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-amber-900 focus:outline-none focus:ring-2 focus:ring-amber-700 focus:ring-offset-2">
            + Crear producto
        </a>
    </div>

    @if (session('success'))
    <div role="status"
        class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800 dark:border-green-900 dark:bg-green-950 dark:text-green-200">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div role="alert"
        class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800 dark:border-red-900 dark:bg-red-950 dark:text-red-200">
        {{ session('error') }}
    </div>
    @endif

    <div
        class="overflow-hidden rounded-xl border border-stone-200 bg-white shadow-sm dark:border-stone-700 dark:bg-stone-900">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px] text-left text-sm">
                <thead
                    class="bg-stone-100 text-xs uppercase tracking-wider text-stone-600 dark:bg-stone-800 dark:text-stone-300">
                    <tr class="transition hover:bg-stone-50 dark:hover:bg-stone-800">
                        <th scope="col" class="px-5 py-4 font-semibold">
                            Imagen
                        </th>
                        <th scope="col" class="px-5 py-4 font-semibold">
                            Nombre
                        </th>
                        <th scope="col" class="px-5 py-4 font-semibold">
                            Categoría
                        </th>
                        <th scope="col" class="px-5 py-4 font-semibold">
                            Precio
                        </th>
                        <th scope="col" class="px-5 py-4 font-semibold">
                            Stock
                        </th>
                        <th scope="col" class="px-5 py-4 font-semibold">
                            Estado
                        </th>
                        <th scope="col" class="px-5 py-4 font-semibold">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-stone-100 dark:divide-stone-700">
                    @forelse ($products as $product)
                    <tr class="transition hover:bg-stone-50 dark:hover:bg-stone-800">
                        <td class="px-5 py-4 text-stone-500 @if($product->image_path)
                                <img src=" {{ Storage::url($product->image_path) }}" alt="{{ $product->name }}" class="h-12 w-12 rounded-lg object-cover border border-stone-200 dark:border-stone-700">
                            @else
                            <span class="text-xs italic">Sin imagen</span>
                            @endif
                        </td>

                        <td class="px-5 py-4 font-medium text-stone-900 dark:text-stone-100">
                            {{ $product->name }}
                        </td>

                        <td class="px-5 py-4 text-stone-600 dark:text-stone-300">
                            {{ $product->category->name ?? 'Sin categoría' }}
                        </td>

                        <td class="px-5 py-4 text-stone-600 dark:text-stone-300">
                            Q{{ number_format($product->price, 2) }}
                        </td>

                        <td class="px-5 py-4 text-stone-600 dark:text-stone-300">
                            {{ $product->stock }}
                        </td>

                        <td class="px-5 py-4">
                            @if ($product->is_active)
                            <span class="inline-flex rounded-full bg-green-100 px-2.5 py-1 text-xs font-semibold text-green-800 dark:bg-green-950 dark:text-green-300">
                                Activo
                            </span>
                            @else
                            <span class="inline-flex rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-800 dark:bg-red-950 dark:text-red-300">
                                Inactivo
                            </span>
                            @endif
                        </td>

                        <td class="px-5 py-4">
                            <!-- Enlace temporal '#' para evitar errores -->
                            <a href="{{ route('admin.products.edit', $product) }}"
                                class="rounded-lg border border-stone-200 px-3 py-2 text-xs font-semibold text-stone-700 transition hover:bg-stone-50 dark:border-stone-600 dark:text-stone-300 dark:hover:bg-stone-700">
                                Editar
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr class="transition hover:bg-stone-50 dark:hover:bg-stone-800">
                        <td colspan="7" class="px-5 py-10 text-center text-stone-500 dark:text-stone-300">
                            No hay productos registrados en el catálogo.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($products->hasPages())
        <div class="border-t border-stone-200 px-5 py-4 dark:border-stone-700">
            {{ $products->links() }}
        </div>
        @endif
    </div>

    <p class="text-sm text-stone-500 dark:text-stone-300">
        Total de productos en esta página: {{ $products->count() }}
    </p>

</div>
@endsection