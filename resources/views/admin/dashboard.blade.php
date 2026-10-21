@extends('layouts.admin')

@section('title', 'Panel principal')

@section('page-title', 'Panel principal')

@section('admin-content')
<div class="space-y-6">

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

        <!-- gestion de productos -->
        <!-- <a href="{{ route('admin.products.index') }}">
             <div class="rounded-xl border border-stone-200 bg-white p-5 opacity-70 dark:border-stone-700 dark:bg-stone-900">
                 <h3 class="text-lg font-semibold text-amber-950 dark:text-amber-200">
                     Gestión de productos
                 </h3>
     
                 <p class="mt-2 text-sm text-stone-600 dark:text-stone-300">
                     Próximamente: administrar productos, precios y categorías.
                 </p>
             </div>
         </a> -->

        <!-- gestion de inventario -->
        <div class="rounded-xl border border-stone-200 bg-white p-5 opacity-70 dark:border-stone-700 dark:bg-stone-900">
            <h3 class="text-lg font-semibold text-amber-950 dark:text-amber-200">
                Inventario
            </h3>

            <p class="mt-2 text-sm text-stone-600 dark:text-stone-300">
                Próximamente: consultar existencias y movimientos.
            </p>
        </div>

        <!-- mensajes de contacto -->
        <div class="rounded-xl border border-stone-200 bg-white p-5 opacity-70 dark:border-stone-700 dark:bg-stone-900">
            <h3 class="text-lg font-semibold text-amber-950 dark:text-amber-200">
                Mensajes de contacto
            </h3>

            <p class="mt-2 text-sm text-stone-600 dark:text-stone-300">
                Próximamente: consultar los mensajes recibidos.
            </p>
        </div>

    </div>
</div>
@endsection