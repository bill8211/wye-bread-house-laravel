@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="bg-amber-900 px-6 py-20 text-center text-white dark:bg-amber-950">
    <h1 class="text-4xl font-bold tracking-tight sm:text-5xl">WYE BREAD HOUSE</h1>
    <p class="mx-auto mt-4 max-w-2xl text-lg text-amber-100">
        Tradición, sabor y calidad en cada horneada. Descubre nuestra selección de panadería y repostería artesanal.
    </p>
    <div class="mt-8">
        <a href="#catalogo" class="rounded-lg bg-white px-6 py-3 text-sm font-semibold text-amber-900 transition hover:bg-amber-50">
            Ver el Catálogo
        </a>
    </div>
</div>

<!-- Sección Identidad (Misión y Visión) -->
<div class="mx-auto max-w-5xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-12 sm:grid-cols-2">
        <div class="rounded-xl border border-stone-200 bg-white p-8 shadow-sm dark:border-stone-700 dark:bg-stone-900">
            <h2 class="text-2xl font-bold text-amber-950 dark:text-amber-200">Nuestra Misión</h2>
            <p class="mt-4 text-stone-600 dark:text-stone-300">
                Ofrecer productos de panadería y repostería de la más alta calidad, elaborados con ingredientes frescos y técnicas tradicionales, para brindar momentos de alegría y sabor a cada familia.
            </p>
        </div>
        <div class="rounded-xl border border-stone-200 bg-white p-8 shadow-sm dark:border-stone-700 dark:bg-stone-900">
            <h2 class="text-2xl font-bold text-amber-950 dark:text-amber-200">Nuestra Visión</h2>
            <p class="mt-4 text-stone-600 dark:text-stone-300">
                Ser la panadería de referencia en la región, reconocida por nuestra excelencia, innovación en repostería y nuestro compromiso inquebrantable con el servicio al cliente.
            </p>
        </div>
    </div>
</div>

<!-- Catálogo de Productos -->
<div id="catalogo" class="bg-stone-50 py-16 dark:bg-stone-950">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h2 class="text-center text-3xl font-bold text-amber-950 dark:text-amber-200">Nuestro Catálogo</h2>
        
        <div class="mt-12 space-y-16">
            @foreach($categories as $category)
                @if($category->products->count() > 0)
                <section>
                    <h3 class="mb-6 border-b border-stone-200 pb-2 text-2xl font-semibold text-stone-800 dark:border-stone-700 dark:text-stone-200">
                        {{ $category->name }}
                    </h3>
                    
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach($category->products as $product)
                        <div class="overflow-hidden rounded-xl border border-stone-200 bg-white shadow-sm transition hover:shadow-md dark:border-stone-700 dark:bg-stone-900">
                            <!-- Imagen -->
                            <div class="aspect-square w-full bg-stone-100 dark:bg-stone-800">
                                @if($product->image_path)
                                    <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                                @else
                                    <div class="flex h-full w-full items-center justify-center text-stone-400">
                                        <svg class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Detalles -->
                            <div class="p-4">
                                <h4 class="font-semibold text-stone-900 dark:text-stone-100">{{ $product->name }}</h4>
                                <p class="mt-1 text-sm text-stone-500 dark:text-stone-400 line-clamp-2">
                                    {{ $product->description ?? 'Producto de la más alta calidad, horneado fresco hoy.' }}
                                </p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="text-lg font-bold text-amber-700 dark:text-amber-400">Q{{ number_format($product->price, 2) }}</span>
                                    @if($product->stock <= 0)
                                        <span class="rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-800 dark:bg-red-900/50 dark:text-red-300">Agotado</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection