@extends('layouts.public')

@section('title', 'Inicio | WYE BREAD HOUSE')

@section('public-content')

    {{-- 1. SECCIÓN PRINCIPAL --}}
<section id="inicio" class="scroll-mt-24 py-12 sm:py-16 lg:py-20">

    <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-14">

        {{-- TEXTO DE BIENVENIDA --}}
        <div class="text-center lg:text-left">

            <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-amber-200 bg-amber-50 px-4 py-2 dark:border-amber-900 dark:bg-stone-900">

                <span class="text-amber-700 dark:text-amber-400">
                    &#10022;
                </span>

                <span class="text-xs font-semibold uppercase tracking-widest text-amber-800 dark:text-amber-300">
                    Panadería y repostería 
                </span>

            </div>

            <h1 class="text-4xl font-bold leading-tight tracking-tight text-stone-900 dark:text-stone-100 sm:text-5xl lg:text-6xl">

                El sabor de lo

                <span class="block text-amber-800 dark:text-amber-400">
                    recién horneado
                </span>

            </h1>

            <p class="mx-auto mt-6 max-w-xl text-base leading-8 text-stone-600 dark:text-stone-300 sm:text-lg lg:mx-0">

                Bienvenido a WYE BREAD HOUSE.

                Descubre nuestros panes tradicionales, panes dulces,
                pasteles y productos de repostería, preparados
                para acompañar tus mejores momentos.

            </p>

            {{-- BOTONES --}}
            <div class="mt-8 flex flex-wrap justify-center gap-4 lg:justify-start">

                <a
                    href="#destacados"
                    class="inline-flex items-center justify-center rounded-lg bg-amber-800 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-500"
                >
                    Descubrir productos
                    <span class="ml-2" aria-hidden="true">&rarr;</span>
                </a>

                <a
                    href="#nosotros"
                    class="inline-flex items-center justify-center rounded-lg border border-stone-300 bg-white px-6 py-3 text-sm font-semibold text-stone-700 transition hover:bg-stone-100 dark:border-stone-600 dark:bg-stone-900 dark:text-stone-200 dark:hover:bg-stone-800"
                >
                    Conócenos
                </a>

            </div>

            {{-- FRASE DECORATIVA --}}
            <div class="mt-10 flex items-center justify-center gap-3 lg:justify-start">

                <div class="h-px w-10 bg-amber-600 dark:bg-amber-500"></div>

                <p class="text-sm italic text-stone-500 dark:text-stone-400">
                    Tradición en cada bocado
                </p>

            </div>

        </div>


        {{-- FOTOGRAFÍA PRINCIPAL --}}
        <div class="relative">

            {{-- Fondo decorativo --}}
            <div class="absolute -inset-3 rounded-[2rem] bg-amber-100/70 dark:bg-amber-950/30 sm:-inset-4"></div>

            <div class="relative overflow-hidden rounded-3xl border border-amber-200 bg-amber-50 shadow-xl dark:border-stone-700 dark:bg-stone-900">

                <img
                    src="{{ asset('images/panaderia.jpg') }}"
                    alt="Selección de panes artesanales de WYE BREAD HOUSE"
                    class="h-72 w-full object-cover sm:h-96 lg:h-[470px]"
                    onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden');"
                >

                {{-- Se muestra únicamente si falta la imagen --}}
                <div class="hidden h-72 items-center justify-center p-8 text-center sm:h-96 lg:h-[470px]">

                    <div>
                        <p class="text-4xl text-amber-800 dark:text-amber-400">
                            &#10022;
                        </p>

                        <p class="mt-4 font-semibold text-stone-800 dark:text-stone-200">
                            WYE BREAD HOUSE
                        </p>

                        <p class="mt-2 text-sm text-stone-500 dark:text-stone-400">
                            Espacio para nuestra fotografía principal
                        </p>
                    </div>

                </div>

            </div>

            {{-- Etiqueta decorativa --}}
            <div class="absolute -bottom-5 right-3 rounded-xl border border-amber-200 bg-white/95 px-5 py-4 shadow-lg backdrop-blur-sm dark:border-stone-700 dark:bg-stone-800/95 sm:right-6">

                <p class="text-xs font-semibold uppercase tracking-wider text-amber-700 dark:text-amber-400">
                    WYE BREAD HOUSE
                </p>

                <p class="mt-1 text-sm font-medium text-stone-700 dark:text-stone-200">
                    Panadería y repostería
                </p>

            </div>

        </div>

    </div>

</section>


    {{-- 2. SOBRE NOSOTROS --}}
<section id="nosotros" class="scroll-mt-24 py-16">

    {{-- Encabezado --}}
    <div class="mb-12 text-center">

        <p class="text-sm font-semibold uppercase tracking-widest text-amber-700 dark:text-amber-400">
            Conoce nuestra esencia
        </p>

        <h2 class="mt-3 text-3xl font-bold text-stone-900 dark:text-stone-100 sm:text-4xl">
            Sobre nosotros
        </h2>

        <p class="mx-auto mt-4 max-w-2xl leading-8 text-stone-600 dark:text-stone-300">
            Descubre más sobre WYE BREAD HOUSE y los principios
            que darán identidad a nuestra panadería y repostería.
        </p>

    </div>

    {{-- Presentación de la empresa --}}
    <div class="mb-10 rounded-2xl border border-amber-200 bg-amber-50 p-6 dark:border-stone-700 dark:bg-stone-900 sm:p-10">

        <p class="text-sm font-semibold uppercase tracking-widest text-amber-800 dark:text-amber-400">
            WYE BREAD HOUSE
        </p>

        <h3 class="mt-3 text-2xl font-bold text-stone-900 dark:text-stone-100 sm:text-3xl">
            Tradición y sabor en cada producto
        </h3>

        <p class="mt-5 max-w-3xl leading-8 text-stone-700 dark:text-stone-300">
            Somos una propuesta dedicada a la panadería y repostería,
            con productos para diferentes gustos y ocasiones.
            En este espacio compartiremos la identidad,
            los objetivos y la esencia de WYE BREAD HOUSE.
        </p>

    </div>

    {{-- Historia, misión, visión y valores --}}
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

        {{-- Nuestra historia --}}
        <article class="rounded-2xl border border-stone-200 bg-white p-7 shadow-sm dark:border-stone-700 dark:bg-stone-900">

            <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-2xl text-amber-900 dark:bg-amber-950 dark:text-amber-300">
                &#10022;
            </div>

            <h3 class="text-xl font-bold text-stone-900 dark:text-stone-100">
                Nuestra historia
            </h3>

            <p class="mt-4 leading-7 text-stone-600 dark:text-stone-300">
                Próximamente compartiremos la historia de
                WYE BREAD HOUSE, sus orígenes y su desarrollo.
            </p>

        </article>

        {{-- Misión --}}
        <article class="rounded-2xl border border-stone-200 bg-white p-7 shadow-sm dark:border-stone-700 dark:bg-stone-900">

            <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-2xl text-amber-900 dark:bg-amber-950 dark:text-amber-300">
                &#9825;
            </div>

            <h3 class="text-xl font-bold text-stone-900 dark:text-stone-100">
                Nuestra misión
            </h3>

            <p class="mt-4 leading-7 text-stone-600 dark:text-stone-300">
                Espacio reservado para incorporar la misión
                oficial de WYE BREAD HOUSE.
            </p>

        </article>

        {{-- Visión --}}
        <article class="rounded-2xl border border-stone-200 bg-white p-7 shadow-sm dark:border-stone-700 dark:bg-stone-900">

            <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-2xl text-amber-900 dark:bg-amber-950 dark:text-amber-300">
                &#9678;
            </div>

            <h3 class="text-xl font-bold text-stone-900 dark:text-stone-100">
                Nuestra visión
            </h3>

            <p class="mt-4 leading-7 text-stone-600 dark:text-stone-300">
                Espacio reservado para incorporar la visión
                oficial de WYE BREAD HOUSE.
            </p>

        </article>

        {{-- Valores --}}
        <article class="rounded-2xl border border-stone-200 bg-white p-7 shadow-sm dark:border-stone-700 dark:bg-stone-900">

            <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-2xl text-amber-900 dark:bg-amber-950 dark:text-amber-300">
                &#9734;
            </div>

            <h3 class="text-xl font-bold text-stone-900 dark:text-stone-100">
                Nuestros valores
            </h3>

            <p class="mt-4 leading-7 text-stone-600 dark:text-stone-300">
                Espacio reservado para describir los valores
                y principios que representan a nuestra empresa.
            </p>

        </article>

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

        <div class="grid grid-cols-[40px_minmax(0,1fr)_40px] items-center gap-2 sm:grid-cols-[48px_minmax(0,1fr)_48px] sm:gap-3">

            {{-- Flecha izquierda --}}
            <button
                type="button"
                data-carousel-prev="featured"
                aria-label="Ver productos destacados anteriores"
                class="flex h-10 w-10 items-center justify-center rounded-full border border-stone-300/40 bg-stone-600/30 text-xl text-stone-900 backdrop-blur-sm transition hover:bg-amber-800/70 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 dark:border-stone-600/50 dark:bg-stone-600/40 dark:text-white sm:h-12 sm:w-12"
            >
                &larr;
            </button>

            {{-- Carrusel central --}}
            <div
                id="carousel-category-featured"
                class="flex min-w-0 snap-x snap-mandatory gap-5 overflow-x-auto scroll-smooth pb-6"
                tabindex="0"
                aria-label="Productos destacados"
            >

                @foreach ($featuredProducts as $product)

                    <article class="w-64 shrink-0 snap-start overflow-hidden rounded-2xl border border-stone-200 bg-white shadow-sm transition hover:shadow-md dark:border-stone-700 dark:bg-stone-900 sm:w-72">

                        {{-- Imagen --}}
                        <div class="flex h-48 items-center justify-center overflow-hidden bg-amber-50 dark:bg-stone-800">

                            @if ($product->image_path)
                                <img
                                    src="{{ asset('storage/' . $product->image_path) }}"
                                    alt="{{ $product->name }}"
                                    loading="lazy"
                                    class="h-full w-full object-cover"
                                >
                            @else
                                <span class="px-4 text-center text-sm text-stone-500 dark:text-stone-400">
                                    Imagen no disponible
                                </span>
                            @endif

                        </div>

                        {{-- Información --}}
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

            {{-- Flecha derecha --}}
            <button
                type="button"
                data-carousel-next="featured"
                aria-label="Ver siguientes productos destacados"
                class="flex h-10 w-10 items-center justify-center rounded-full border border-stone-300/40 bg-stone-600/30 text-xl text-stone-900 backdrop-blur-sm transition hover:bg-amber-800/70 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 dark:border-stone-600/50 dark:bg-stone-600/40 dark:text-white sm:h-12 sm:w-12"
            >
                &rarr;
            </button>

        </div>

        <p class="text-center text-xs text-stone-500 dark:text-stone-400 sm:text-right">
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

    {{-- Encabezado principal --}}
    <div class="mb-12 text-center">
        <p class="text-sm font-semibold uppercase tracking-widest text-amber-700 dark:text-amber-400">
            Explora nuestros sabores
        </p>

        <h2 class="mt-3 text-3xl font-bold text-stone-900 dark:text-stone-100 sm:text-4xl">
            Nuestras categorías
        </h2>

        <p class="mx-auto mt-4 max-w-2xl text-stone-600 dark:text-stone-300">
            Descubre nuestros productos de panadería y repostería,
            organizados especialmente para ti.
        </p>
    </div>

    <div class="space-y-16">

        @forelse ($categories as $category)

            <div class="space-y-6">

                {{-- Nombre y descripción de la categoría --}}
                <div class="border-b border-stone-200 pb-4 dark:border-stone-700">

                    <h3 class="text-2xl font-bold text-amber-900 dark:text-amber-300">
                        {{ $category->name }}
                    </h3>

                    @if ($category->description)
                        <p class="mt-2 text-sm text-stone-600 dark:text-stone-400">
                            {{ $category->description }}
                        </p>
                    @endif

                </div>

                @if ($category->products->isNotEmpty())

                    {{-- Flechas y productos en la misma fila --}}
                    <div class="grid grid-cols-[40px_minmax(0,1fr)_40px] items-center gap-2 sm:grid-cols-[48px_minmax(0,1fr)_48px] sm:gap-3">

                        {{-- Flecha izquierda --}}
                        <button
                            type="button"
                            data-carousel-prev="{{ $category->id }}"
                            aria-label="Ver productos anteriores de {{ $category->name }}"
                            class="flex h-10 w-10 items-center justify-center rounded-full border border-stone-300/40 bg-stone-600/30 text-xl text-stone-900 backdrop-blur-sm transition hover:bg-amber-800/70 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 dark:border-stone-600/50 dark:bg-stone-600/40 dark:text-white sm:h-12 sm:w-12"
                        >
                            &larr;
                        </button>

                        {{-- Carrusel central --}}
                        <div
                            id="carousel-category-{{ $category->id }}"
                            class="flex min-w-0 snap-x snap-mandatory gap-5 overflow-x-auto scroll-smooth pb-6"
                            tabindex="0"
                            aria-label="Productos de {{ $category->name }}"
                        >

                            @foreach ($category->products as $product)

                                <article class="w-64 shrink-0 snap-start overflow-hidden rounded-2xl border border-stone-200 bg-white shadow-sm transition hover:shadow-md dark:border-stone-700 dark:bg-stone-900 sm:w-72">

                                    {{-- Imagen --}}
                                    <div class="flex h-48 items-center justify-center overflow-hidden bg-amber-50 dark:bg-stone-800">

                                        @if ($product->image_path)
                                            <img
                                                src="{{ asset('storage/' . $product->image_path) }}"
                                                alt="{{ $product->name }}"
                                                loading="lazy"
                                                class="h-full w-full object-cover"
                                            >
                                        @else
                                            <span class="px-4 text-center text-sm text-stone-500 dark:text-stone-400">
                                                Imagen no disponible
                                            </span>
                                        @endif

                                    </div>

                                    {{-- Información del producto --}}
                                    <div class="space-y-3 p-5">

                                        <h4 class="text-lg font-bold text-stone-900 dark:text-stone-100">
                                            {{ $product->name }}
                                        </h4>

                                        <p class="line-clamp-2 min-h-10 text-sm leading-5 text-stone-600 dark:text-stone-400">
                                            {{ $product->description ?: 'Producto de nuestra panadería.' }}
                                        </p>

                                        <div class="border-t border-stone-100 pt-3 dark:border-stone-700">

                                            <p class="text-xl font-bold text-amber-800 dark:text-amber-300">
                                                Q{{ number_format((float) $product->price, 2) }}
                                            </p>

                                            @if ($product->stock > 0)
                                                <p class="mt-2 text-xs font-medium text-green-700 dark:text-green-400">
                                                    Disponible
                                                </p>
                                            @else
                                                <p class="mt-2 text-xs font-medium text-red-700 dark:text-red-400">
                                                    Agotado
                                                </p>
                                            @endif

                                        </div>

                                    </div>

                                </article>

                            @endforeach

                        </div>

                        {{-- Flecha derecha --}}
                        <button
                            type="button"
                            data-carousel-next="{{ $category->id }}"
                            aria-label="Ver productos siguientes de {{ $category->name }}"
                            class="flex h-10 w-10 items-center justify-center rounded-full border border-stone-300/40 bg-stone-600/30 text-xl text-stone-900 backdrop-blur-sm transition hover:bg-amber-800/70 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 dark:border-stone-600/50 dark:bg-stone-600/40 dark:text-white sm:h-12 sm:w-12"
                        >
                            &rarr;
                        </button>

                    </div>

                    <p class="text-center text-xs text-stone-500 dark:text-stone-400 sm:text-right">
                        Desliza horizontalmente para explorar más productos.
                    </p>

                @else

                    {{-- Categoría sin productos --}}
                    <div class="rounded-xl border border-dashed border-stone-300 bg-stone-50 px-6 py-10 text-center dark:border-stone-700 dark:bg-stone-900">

                        <p class="text-sm text-stone-600 dark:text-stone-400">
                            Próximamente tendremos productos disponibles
                            en esta categoría.
                        </p>

                    </div>

                @endif

            </div>

        @empty

            {{-- No existen categorías --}}
            <div class="rounded-xl border border-stone-200 bg-white p-10 text-center dark:border-stone-700 dark:bg-stone-900">

                <p class="text-stone-600 dark:text-stone-300">
                    Todavía no hay categorías registradas.
                </p>

            </div>

        @endforelse

    </div>

</section>


    {{-- 5. CONTACTO --}}
<section id="contacto" class="scroll-mt-24 py-16">

    {{-- Encabezado --}}
    <div class="mb-12 text-center">

        <p class="text-sm font-semibold uppercase tracking-widest text-amber-700 dark:text-amber-400">
            Estamos para escucharte
        </p>

        <h2 class="mt-3 text-3xl font-bold text-stone-900 dark:text-stone-100 sm:text-4xl">
            Contáctanos
        </h2>

        <p class="mx-auto mt-4 max-w-2xl leading-8 text-stone-600 dark:text-stone-300">
            ¿Tienes alguna consulta sobre nuestros productos?
            En WYE BREAD HOUSE nos encantará conocer tus comentarios.
        </p>

    </div>

    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">

        {{-- Información de contacto --}}
        <div class="rounded-2xl border border-amber-200 bg-amber-50 p-7 dark:border-stone-700 dark:bg-stone-900 sm:p-10">

            <p class="text-sm font-semibold uppercase tracking-widest text-amber-800 dark:text-amber-400">
                WYE BREAD HOUSE
            </p>

            <h3 class="mt-4 text-2xl font-bold text-stone-900 dark:text-stone-100">
                Nos encantará saber de ti
            </h3>

            <p class="mt-5 leading-8 text-stone-700 dark:text-stone-300">
                Si deseas conocer más sobre nuestros productos
                de panadería y repostería, puedes enviarnos
                un mensaje mediante el formulario.
            </p>

            <div class="mt-10 space-y-7">

                {{-- Correo --}}
                <div class="flex items-start gap-4">

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-900 dark:bg-amber-950 dark:text-amber-300">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="23" height="23"
                             viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="1.8"
                             stroke-linecap="round"
                             stroke-linejoin="round"
                             aria-hidden="true">
                            <rect x="2" y="4" width="20" height="16" rx="2"/>
                            <path d="m22 7-10 6L2 7"/>
                        </svg>
                    </div>

                    <div>
                        <h4 class="font-semibold text-stone-900 dark:text-stone-100">
                            Correo electrónico
                        </h4>

                        <p class="mt-1 text-sm text-stone-600 dark:text-stone-400">
                            Pendiente de información oficial.
                        </p>
                    </div>

                </div>

                {{-- Teléfono --}}
                <div class="flex items-start gap-4">

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-900 dark:bg-amber-950 dark:text-amber-300">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="23" height="23"
                             viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="1.8"
                             stroke-linecap="round"
                             stroke-linejoin="round"
                             aria-hidden="true">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 3.09 5.18 2 2 0 0 1 5.08 3h3a2 2 0 0 1 2 1.72l.47 2.81a2 2 0 0 1-.57 1.7L8.09 11a16 16 0 0 0 4.91 4.91l1.77-1.89a2 2 0 0 1 1.7-.57l2.81.47A2 2 0 0 1 22 16.92z"/>
                        </svg>
                    </div>

                    <div>
                        <h4 class="font-semibold text-stone-900 dark:text-stone-100">
                            Teléfono
                        </h4>

                        <p class="mt-1 text-sm text-stone-600 dark:text-stone-400">
                            Pendiente de información oficial.
                        </p>
                    </div>

                </div>

                {{-- Ubicación --}}
                <div class="flex items-start gap-4">

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-900 dark:bg-amber-950 dark:text-amber-300">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="23" height="23"
                             viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="1.8"
                             stroke-linecap="round"
                             stroke-linejoin="round"
                             aria-hidden="true">
                            <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/>
                            <circle cx="12" cy="10" r="2.5"/>
                        </svg>
                    </div>

                    <div>
                        <h4 class="font-semibold text-stone-900 dark:text-stone-100">
                            Nuestra ubicación
                        </h4>

                        <p class="mt-1 text-sm text-stone-600 dark:text-stone-400">
                            Pendiente de información oficial.
                        </p>
                    </div>

                </div>

            </div>

        </div>


        {{-- Formulario --}}
        <div class="rounded-2xl border border-stone-200 bg-white p-7 shadow-sm dark:border-stone-700 dark:bg-stone-900 sm:p-10">

            <h3 class="text-2xl font-bold text-stone-900 dark:text-stone-100">
                Envíanos un mensaje
            </h3>

            <p class="mt-2 text-sm text-stone-600 dark:text-stone-400">
                Completa el formulario y comparte tu consulta con nosotros.
            </p>
            {{-- Mensaje de confirmación --}}
@if (session('contact_success'))
    <div
        role="status"
        class="mt-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800 dark:border-green-900 dark:bg-green-950 dark:text-green-200"
    >
        {{ session('contact_success') }}
    </div>
@endif

{{-- Errores de validación --}}
@if ($errors->any())
    <div
        role="alert"
        class="mt-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800 dark:border-red-900 dark:bg-red-950 dark:text-red-200"
    >
        <p class="font-semibold">
            Revisa los siguientes errores:
        </p>

        <ul class="mt-2 list-inside list-disc space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <form
    method="POST"
    action="{{ route('contact.store') }}"
    class="mt-8 space-y-5"
    id="contact-form"
>
    @csrf

                {{-- Nombre --}}
                <div>
                    <label for="sender_name"
                           class="mb-2 block text-sm font-medium text-stone-700 dark:text-stone-200">
                        Nombre completo
                    </label>

                    <input
                        type="text"
                        id="sender_name"
                        name="sender_name"
                        value="{{ old('sender_name') }}"
                        maxlength="255"
                        required
                        autocomplete="name"
                        placeholder="Escribe tu nombre"
                        class="w-full rounded-lg border border-stone-300 bg-white px-4 py-3 text-sm text-stone-900 outline-none transition placeholder:text-stone-400 focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100"
                    >
                </div>

                {{-- Correo --}}
                <div>
                    <label for="sender_email"
                           class="mb-2 block text-sm font-medium text-stone-700 dark:text-stone-200">
                        Correo electrónico
                    </label>

                    <input
                        type="email"
                        id="sender_email"
                        name="sender_email"
                        value="{{ old('sender_email') }}"
                        maxlength="255"
                        required
                        autocomplete="email"
                        placeholder="tucorreo@ejemplo.com"
                        class="w-full rounded-lg border border-stone-300 bg-white px-4 py-3 text-sm text-stone-900 outline-none transition placeholder:text-stone-400 focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100"
                    >
                </div>

                {{-- Asunto --}}
                <div>
                    <label for="subject"
                           class="mb-2 block text-sm font-medium text-stone-700 dark:text-stone-200">
                        Asunto
                    </label>

                    <input
                        type="text"
                        id="subject"
                        name="subject"
                        value="{{ old('subject') }}"
                        maxlength="255"
                        required
                        placeholder="¿En qué podemos ayudarte?"
                        class="w-full rounded-lg border border-stone-300 bg-white px-4 py-3 text-sm text-stone-900 outline-none transition placeholder:text-stone-400 focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100"
                    >
                </div>

                {{-- Mensaje --}}
                <div>
                    <label for="message"
                           class="mb-2 block text-sm font-medium text-stone-700 dark:text-stone-200">
                        Mensaje
                    </label>

                    <textarea
                        id="message"
                        name="message"
                        rows="5"
                        minlength="10"
                        maxlength="5000"
                        required
                        placeholder="Escribe aquí tu mensaje..."
                        class="w-full resize-y rounded-lg border border-stone-300 bg-white px-4 py-3 text-sm text-stone-900 outline-none transition placeholder:text-stone-400 focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100"
                    >{{ old('message') }}</textarea>
                </div>

                <button
    type="submit"
    class="w-full rounded-lg bg-amber-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-amber-900 focus:outline-none focus:ring-2 focus:ring-amber-700 focus:ring-offset-2 dark:focus:ring-offset-stone-900"
>
    Enviar mensaje
</button>

                <p class="text-center text-xs text-stone-500 dark:text-stone-400">
                    El envío estará disponible cuando terminemos
                    la conexión con la base de datos.
                </p>

            </form>

        </div>

    </div>

</section>

@endsection