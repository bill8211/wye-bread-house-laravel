
@extends('layouts.app')

@section('title', trim($__env->yieldContent('title', 'Panel administrativo')) . ' | WYE BREAD HOUSE')

@section('content')
    <div class="space-y-6">

        <div class="border-b border-stone-200 pb-5">
            <p class="text-sm font-semibold uppercase tracking-wider text-amber-800">
                Administración
            </p>

            <h1 class="mt-2 text-2xl font-bold tracking-tight text-stone-900 sm:text-3xl text-lg font-semibold text-amber-950 dark:text-amber-200">
                @yield('page-title', 'Panel administrativo')
            </h1>

            <p class="mt-2 text-sm text-stone-600" >
                Gestiona las operaciones del sistema WYE BREAD HOUSE.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-[240px_minmax(0,1fr)]">

            <aside class="h-fit rounded-xl border border-stone-200 bg-white p-4 shadow-sm dark:border-stone-700 dark:bg-stone-900">
                <h2 class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-stone-500 dark:text-stone-400">
                    Menú principal
                </h2>

                <nav class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}"
                       class="block rounded-lg px-3 py-2 text-sm font-medium text-stone-700 transition hover:bg-amber-50 hover:text-amber-900 dark:text-stone-200 dark:hover:bg-stone-800 dark:hover:text-amber-300">
                        Panel principal
                    </a>

                    @can('manage-users')
                    <a href="{{ route('admin.users.index') }}"
                       class="block rounded-lg px-3 py-2 text-sm font-medium text-stone-700 transition hover:bg-amber-50 hover:text-amber-900 dark:text-stone-200 dark:hover:bg-stone-800 dark:hover:text-amber-300 ">
                        Gestión de usuarios
                    </a>
                    @endcan

                    @can('manage-users')
                    <a href="{{ route('admin.products.index') }}"
                       class="block rounded-lg px-3 py-2 text-sm font-medium text-stone-700 transition hover:bg-amber-50 hover:text-amber-900 dark:text-stone-200 dark:hover:bg-stone-800 dark:hover:text-amber-300 ">
                        Gestión de Productos
                    </a>
                    @endcan

                    <a href="{{ route('admin.inventory.index') }}"
                       class="block rounded-lg px-3 py-2 text-sm font-medium text-stone-700 transition hover:bg-amber-50 hover:text-amber-900 dark:text-stone-200 dark:hover:bg-stone-800 dark:hover:text-amber-300 ">
                        Gestión de Inventarios
                    </a>

                    <a href="{{ route('admin.contacts.index') }}"
                       class="block rounded-lg px-3 py-2 text-sm font-medium text-stone-700 transition hover:bg-amber-50 hover:text-amber-900 dark:text-stone-200 dark:hover:bg-stone-800 dark:hover:text-amber-300 ">
                        Gestión de Mensajes
                    </a>
                </nav>
            </aside>

            <section class="min-w-0">
                @yield('admin-content')
            </section>

        </div>
    </div>
@endsection
