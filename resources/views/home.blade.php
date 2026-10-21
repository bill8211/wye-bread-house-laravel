@extends('layouts.public')

@section('title', 'Inicio | WYE BREAD HOUSE')

@section('public-content')

    {{-- 1. SECCIÓN PRINCIPAL --}}
    <section id="inicio" class="py-16 sm:py-24">

        <div class="mx-auto max-w-4xl text-center">

            <p class="mb-4 text-sm font-semibold uppercase tracking-[0.2em] text-amber-700 dark:text-amber-400">
                Panadería y repostería artesanal
            </p>

            <h1 class="text-4xl font-bold leading-tight tracking-tight text-stone-900 dark:text-stone-100 sm:text-5xl lg:text-6xl">
                El sabor de lo
                <span class="text-amber-800 dark:text-amber-400">
                    recién horneado
                </span>
            </h1>

            <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-stone-600 dark:text-stone-300">
                Bienvenido a WYE BREAD HOUSE. Descubre nuestros panes
                tradicionales, panes dulces, pasteles y productos de
                repostería, preparados para acompañar tus mejores momentos.
            </p>

            <div class="mt-8 flex flex-wrap justify-center gap-4">

                <a href="#destacados"
                   class="rounded-lg bg-amber-800 px-6 py-3 text-sm font-semibold text-white transition hover:bg-amber-900">
                    Descubrir productos
                </a>

                <a href="#nosotros"
                   class="rounded-lg border border-stone-300 px-6 py-3 text-sm font-semibold text-stone-700 transition hover:bg-stone-100 dark:border-stone-600 dark:text-stone-200 dark:hover:bg-stone-800">
                    Conócenos
                </a>

            </div>
        </div>
    </section>


    {{-- 2. SOBRE NOSOTROS --}}
    <section id="nosotros" class="scroll-mt-24 py-16">

        <div class="grid items-center gap-10 lg:grid-cols-2">

            <div class="rounded-2xl border border-amber-200 bg-amber-50 p-8 dark:border-stone-700 dark:bg-stone-900 sm:p-12">

                <p class="text-sm font-semibold uppercase tracking-widest text-amber-800 dark:text-amber-400">
                    Nuestra esencia
                </p>

                <h2 class="mt-4 text-3xl font-bold text-stone-900 dark:text-stone-100 sm:text-4xl">
                    Tradición y sabor en cada producto
                </h2>

                <p class="mt-6 leading-8 text-stone-700 dark:text-stone-300">
                    En WYE BREAD HOUSE queremos compartir el gusto por
                    la panadería y la repostería, ofreciendo productos
                    que acompañen los momentos cotidianos y las
                    celebraciones especiales.
                </p>

                <p class="mt-4 leading-8 text-stone-700 dark:text-stone-300">
                    Nuestra propuesta reúne sabores tradicionales
                    y diferentes opciones para quienes disfrutan
                    del pan recién horneado.
                </p>

            </div>

            <div class="flex min-h-72 items-center justify-center rounded-2xl border border-dashed border-stone-300 bg-stone-100 p-8 text-center dark:border-stone-700 dark:bg-stone-900">

                <p class="max-w-xs text-sm text-stone-500 dark:text-stone-400">
                    Próximamente: fotografía de nuestra panadería
                    y sus productos artesanales.
                </p>

            </div>

        </div>
    </section>


    {{-- 3. PRODUCTOS DESTACADOS --}}
    <section id="destacados" class="scroll-mt-24 py-16">

    <div class="mb-10 text-center">
        <p class="text-sm font-semibold uppercase tracking-widest text-amber-700 dark:text-amber-400">
            Hechos para disfrutar
        </p>

        <h2 class="mt-3 text-3xl font-bold text-stone-900 dark:text-stone-100 sm:text-4xl">
            Productos destacados
        </h2>

        <p class="mx-auto mt-4 max-w-2xl text-stone-600 dark:text-stone-300">
            Descubre algunas de nuestras deliciosas opciones de panadería y repostería.
        </p>
    </div>

    @if ($featuredProducts->isNotEmpty())

        <div class="flex snap-x snap-mandatory gap-5 overflow-x-auto pb-6">

            @foreach ($featuredProducts as $product)

                <article class="w-64 shrink-0 snap-start overflow-hidden rounded-2xl border border-stone-200 bg-white shadow-sm transition hover:shadow-md dark:border-stone-700 dark:bg-stone-900 sm:w-72">

                    <div class="flex h-48 items-center justify-center overflow-hidden bg-amber-50 dark:bg-stone-800">

                        @if ($product->image_path)
                            <img
                                src="{{ asset('storage/' . $product->image_path) }}"
                                alt="{{ $product->name }}"
                                loading="lazy"
                                class="h-full w-full object-cover"
                            >
                        @else
                            <span class="text-sm text-stone-500 dark:text-stone-400">
                                Imagen no disponible
                            </span>
                        @endif

                    </div>

                    <div class="space-y-3 p-5">

                        <p class="text-xs font-semibold uppercase tracking-wider text-amber-700 dark:text-amber-400">
                            {{ $product->category?->name ?? 'Sin categoría' }}
                        </p>

                        <h3 class="text-lg font-bold text-stone-900 dark:text-stone-100">
                            {{ $product->name }}
                        </h3>

                        <p class="line-clamp-2 min-h-10 text-sm leading-5 text-stone-600 dark:text-stone-400">
                            {{ $product->description ?: 'Producto de nuestra panadería.' }}
                        </p>

                        <div class="border-t border-stone-100 pt-3 dark:border-stone-700">
                            <p class="text-xl font-bold text-amber-800 dark:text-amber-300">
                                Q{{ number_format((float) $product->price, 2) }}
                            </p>
                        </div>

                    </div>
                </article>

            @endforeach

        </div>

        <p class="mt-2 text-center text-xs text-stone-500 dark:text-stone-400">
            Desliza horizontalmente para explorar los productos.
        </p>

    @else

        <div class="rounded-2xl border border-stone-200 bg-white px-6 py-14 text-center dark:border-stone-700 dark:bg-stone-900">
            <p class="text-stone-600 dark:text-stone-300">
                Todavía no hay productos disponibles para mostrar.
            </p>
        </div>

    @endif

</section>


    {{-- 4. NUESTRAS CATEGORÍAS --}}
    <section id="categorias" class="scroll-mt-24 py-16">

        <div class="mb-10 text-center">

            <p class="text-sm font-semibold uppercase tracking-widest text-amber-700 dark:text-amber-400">
                Explora nuestros sabores
            </p>

            <h2 class="mt-3 text-3xl font-bold text-stone-900 dark:text-stone-100 sm:text-4xl">
                Nuestras categorías
            </h2>

            <p class="mx-auto mt-4 max-w-2xl text-stone-600 dark:text-stone-300">
                Encuentra opciones para diferentes gustos y ocasiones.
            </p>

        </div>

        @php
            $categories = [
                [
                    'name' => 'Pan tradicional',
                    'description' => 'Sabores clásicos que forman parte de nuestra tradición.',
                ],
                [
                    'name' => 'Pan dulce',
                    'description' => 'Opciones dulces para acompañar cualquier momento.',
                ],
                [
                    'name' => 'Pasteles',
                    'description' => 'Deliciosas opciones para compartir y celebrar.',
                ],
                [
                    'name' => 'Repostería',
                    'description' => 'Especialidades dulces para disfrutar.',
                ],
            ];
        @endphp

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">

            @foreach ($categories as $category)

                <article class="rounded-2xl border border-stone-200 bg-white p-7 text-center shadow-sm transition hover:border-amber-300 hover:shadow-md dark:border-stone-700 dark:bg-stone-900 dark:hover:border-amber-700">

                    <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-amber-100 dark:bg-amber-950">
                        <span class="text-2xl text-amber-900 dark:text-amber-300">
                            &#10022;
                        </span>
                    </div>

                    <h3 class="text-lg font-semibold text-stone-900 dark:text-stone-100">
                        {{ $category['name'] }}
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-stone-600 dark:text-stone-400">
                        {{ $category['description'] }}
                    </p>

                </article>

            @endforeach

        </div>
    </section>


    {{-- 5. CONTACTO --}}
    <section id="contacto" class="scroll-mt-24 py-16">

        <div class="rounded-2xl bg-amber-900 px-6 py-12 text-center text-white dark:bg-stone-900 sm:px-12 sm:py-16">

            <p class="text-sm font-semibold uppercase tracking-widest text-amber-200">
                Estamos para escucharte
            </p>

            <h2 class="mt-4 text-3xl font-bold sm:text-4xl">
                Nos encantará saber de ti
            </h2>

            <p class="mx-auto mt-5 max-w-2xl leading-8 text-amber-100 dark:text-stone-300">
                ¿Tienes alguna consulta sobre nuestros productos?
                Queremos ayudarte y conocer tus comentarios.
            </p>

            <p class="mt-6 text-sm text-amber-200 dark:text-stone-400">
                Próximamente podrás enviarnos un mensaje
                directamente desde nuestro formulario de contacto.
            </p>

        </div>
    </section>

@endsection