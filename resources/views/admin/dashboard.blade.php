@extends('layouts.admin')

@section('title', 'Panel principal')

@section('page-title', 'Panel principal')

@section('admin-content')
<div class="space-y-6">

    <!-- SECCIÓN DE ALERTAS DE BAJO STOCK -->
    @if($lowStockProducts->count() > 0)
    <div class="rounded-xl border border-red-200 bg-red-50 p-5 dark:border-red-900/50 dark:bg-red-950/30">
        <h3 class="flex items-center text-lg font-semibold text-red-800 dark:text-red-400">
            <!-- Icono de advertencia -->
            <svg class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            Atención: Productos con bajo stock ({{ $lowStockProducts->count() }})
        </h3>
        <p class="mt-1 text-sm text-red-600 dark:text-red-300">
            Los siguientes productos tienen 10 o menos unidades disponibles. Registra una entrada de inventario pronto.
        </p>

        <div class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($lowStockProducts as $product)
            <div class="rounded-lg border border-red-100 bg-white p-4 shadow-sm dark:border-red-800 dark:bg-stone-900">
                <p class="font-medium text-stone-900 dark:text-stone-100">{{ $product->name }}</p>
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">Stock actual: <span class="font-bold">{{ $product->stock }}</span></p>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <div class="rounded-xl border border-amber-200 bg-amber-50 p-5 dark:border-amber-900 dark:bg-stone-900 sm:p-6">
        <h2 class="text-lg font-semibold text-amber-950 dark:text-amber-200">
            ¡Bienvenido, {{ auth()->user()->name }}!
        </h2>

        <p class="mt-2 text-sm leading-6 text-amber-900 dark:text-stone-300">
            Desde este panel podrás administrar los usuarios y acceder
            a los diferentes módulos del sistema.
        </p>
    </div>

    <div>
        <h2 class="text-lg font-semibold text-stone-900 dark:text-stone-100">
            Módulos del sistema
        </h2>

        <p class="mt-1 text-sm text-stone-600">
            Selecciona un módulo para continuar.
        </p>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        @can('manage-users')
        <!-- Gestionar usuario -->
        <a href="{{ route('admin.users.index') }}"
            class="group rounded-xl border border-stone-200 bg-white p-5 shadow-sm transition hover:border-amber-300 hover:shadow-md dark:border-stone-700 dark:bg-stone-900 dark:hover:border-amber-700">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-amber-100 text-amber-800">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        width="22" height="22" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        <circle cx="10" cy="7" r="4" />
                        <path d="M20 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-amber-950 dark:text-amber-200"">
                        Gestión de usuarios
                    </h3>

                    <p class=" mt-2 text-sm text-stone-600 dark:text-stone-300">
                        Crear, consultar y activar o desactivar cuentas.
                        </p>
                </div>
            </div>
        </a>
        @endcan

        @can('manage-users')
        <!-- gestionar productos -->
        <a href="{{ route('admin.products.index') }}"
            class="group rounded-xl border border-stone-200 bg-white p-5 shadow-sm transition hover:border-amber-300 hover:shadow-md dark:border-stone-700 dark:bg-stone-900 dark:hover:border-amber-700">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-amber-100 text-amber-800">
                    <svg xmlns="http://w3.org" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M5 10V18a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V10c0-3-2-4-4.5-4C13.2 6 12.8 7 12 7s-1.2-1-2.5-1C7 6 5 7 5 10z" />
                        <path d="M8 10v7c0 .6.4 1 1 1h6c.6 0 1-.4 1-1v-7" />
                    </svg>

                </div>

                <div>
                    <h3 class="text-lg font-semibold text-amber-950 dark:text-amber-200"">
                        Gestión de Productos
                    </h3>

                    <p class=" mt-2 text-sm text-stone-600 dark:text-stone-300">
                        Crear y consultar productos.
                        </p>
                </div>
            </div>
        </a>
        @endcan


        <!-- gestionar Inventarios -->
        <a href="{{ route('admin.inventory.index') }}"
            class="group rounded-xl border border-stone-200 bg-white p-5 shadow-sm transition hover:border-amber-300 hover:shadow-md dark:border-stone-700 dark:bg-stone-900 dark:hover:border-amber-700">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-amber-100 text-amber-800">
                    <svg xmlns="http://w3.org" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <!-- Caja superior / Principal -->
                        <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z" />
                        <!-- Líneas internas que dan el efecto 3D de la caja -->
                        <path d="m3.3 7 8.7 5 8.7-5" />
                        <path d="M12 22V12" />
                    </svg>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-amber-950 dark:text-amber-200"">
                        Gestión de Inventarios
                    </h3>

                    <p class=" mt-2 text-sm text-stone-600 dark:text-stone-300">
                        Crear y consultar de inventarios.
                        </p>
                </div>
            </div>
        </a>

        <!-- gestionar Inventarios -->
        <a href="{{ route('admin.contacts.index') }}"
            class="group rounded-xl border border-stone-200 bg-white p-5 shadow-sm transition hover:border-amber-300 hover:shadow-md dark:border-stone-700 dark:bg-stone-900 dark:hover:border-amber-700">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-amber-100 text-amber-800">
                    <svg xmlns="http://w3.org" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <!-- Cuerpo del sobre -->
                        <rect width="20" height="16" x="2" y="4" rx="2" />
                        <!-- Pliegue de la carta -->
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                    </svg>

                </div>

                <div>
                    <h3 class="text-lg font-semibold text-amber-950 dark:text-amber-200"">
                        Gestión de Mensajes
                    </h3>

                    <p class=" mt-2 text-sm text-stone-600 dark:text-stone-300">
                        Consulta de mensajes.
                        </p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection