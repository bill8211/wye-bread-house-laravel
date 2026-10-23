@extends('layouts.app')

{{-- ENCABEZADO PÚBLICO --}}
@section('public-header')

<header class="border-b border-stone-200 bg-white dark:border-stone-800 dark:bg-stone-900">

    <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-5 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">

        {{-- LOGOTIPO --}}
        <a
            href="{{ route('home') }}"
            class="text-center text-xl font-bold tracking-wide text-amber-800 dark:text-amber-400 lg:text-left"
        >
            WYE BREAD HOUSE
        </a>

        {{-- MENÚ DE NAVEGACIÓN --}}
        <nav
            aria-label="Navegación principal"
            class="flex flex-wrap items-center justify-center gap-4 text-sm font-medium sm:gap-6"
        >

            {{-- Inicio --}}
            <a
                href="{{ route('home') }}#inicio"
                class="text-stone-700 transition hover:text-amber-800 dark:text-stone-200 dark:hover:text-amber-400"
            >
                Inicio
            </a>

            {{-- Nosotros --}}
            <a
                href="{{ route('home') }}#nosotros"
                class="text-stone-700 transition hover:text-amber-800 dark:text-stone-200 dark:hover:text-amber-400"
            >
                Nosotros
            </a>

            {{-- Productos destacados --}}
            <a
                href="{{ route('home') }}#destacados"
                class="text-stone-700 transition hover:text-amber-800 dark:text-stone-200 dark:hover:text-amber-400"
            >
                Destacados
            </a>

            {{-- Categorías --}}
            <a
                href="{{ route('home') }}#categorias"
                class="text-stone-700 transition hover:text-amber-800 dark:text-stone-200 dark:hover:text-amber-400"
            >
                Categorías
            </a>

            {{-- Contacto --}}
            <a
                href="{{ route('home') }}#contacto"
                class="text-stone-700 transition hover:text-amber-800 dark:text-stone-200 dark:hover:text-amber-400"
            >
                Contacto
            </a>

            {{-- ACCESO AL SISTEMA --}}
            @guest

                <a
                    href="{{ route('login') }}"
                    class="rounded-lg bg-amber-800 px-4 py-2 text-white transition hover:bg-amber-900"
                >
                    Iniciar sesión
                </a>

            @else

                @if (auth()->user()->role === 'admin')

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="rounded-lg bg-amber-800 px-4 py-2 text-white transition hover:bg-amber-900"
                    >
                        Panel administrativo
                    </a>

                @endif

            @endguest

            {{-- BOTÓN DE MODO OSCURO --}}
            <button
                id="theme-toggle"
                type="button"
                aria-pressed="false"
                class="rounded-lg border border-stone-300 px-3 py-2 text-stone-700 transition hover:bg-stone-100 dark:border-stone-600 dark:text-stone-200 dark:hover:bg-stone-800"
            >
                Modo oscuro
            </button>

        </nav>

    </div>

</header>

@endsection


{{-- CONTENIDO PÚBLICO --}}
@section('content')
    @yield('public-content')
@endsection