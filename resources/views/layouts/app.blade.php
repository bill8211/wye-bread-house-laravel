<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'WYE BREAD HOUSE')</title>

    <script>
        try {
            if (localStorage.getItem('wye-theme') === 'dark') {
                document.documentElement.classList.add('dark');
            }
        } catch (error) {
            // Se utiliza el modo claro si no se puede leer la preferencia.
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-stone-50 font-sans text-stone-800 antialiased transition-colors dark:bg-stone-950 dark:text-stone-100">
    @hasSection('public-header')
    @yield('public-header')
    @else
    <header class="border-b border-stone-200 bg-white dark:border-stone-800 dark:bg-stone-900"">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">

            <a href="{{ route('admin.dashboard') }}" /////
                class="text-xl font-bold tracking-wide text-amber-800">
                WYE BREAD HOUSE
            </a>

            <nav class="flex items-center gap-4 text-sm">

                <button
                    id="theme-toggle"
                    type="button"
                    class="rounded-lg border border-stone-200 px-3 py-2 text-sm font-medium text-stone-700 transition hover:bg-stone-100 dark:border-stone-600 dark:text-stone-200 dark:hover:bg-stone-700"
                    aria-pressed="false">
                    Modo oscuro
                </button>
                <a href="{{ route('admin.dashboard') }}"
                    class="text-stone-600 transition hover:text-amber-800">
                    Inicio
                </a>

                @auth
                <span class="hidden text-stone-600 sm:inline">
                    Hola, {{ auth()->user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="rounded-lg bg-stone-100 px-3 py-2 font-medium text-stone-700 transition hover:bg-stone-200">
                        Cerrar sesión
                    </button>
                </form>
                @else
                <a href="{{ route('login') }}"
                    class="rounded-lg bg-amber-800 px-3 py-2 font-medium text-white transition hover:bg-amber-900">
                    Iniciar sesión
                </a>
                @endauth
            </nav>

        </div>
    </header>
    @endif

    <main class="mx-auto w-full max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <footer class="mt-12 border-t border-stone-200 bg-white dark:border-stone-800 dark:bg-stone-900">
        <div class="mx-auto max-w-7xl px-4 py-5 text-center text-sm text-stone-500 sm:px-6 lg:px-8">
            &copy; {{ date('Y') }} WYE BREAD HOUSE. Todos los derechos reservados.
        </div>
    </footer>

</body>

</html>