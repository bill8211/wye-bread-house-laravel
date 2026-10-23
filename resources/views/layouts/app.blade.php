<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

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
    <header class="sticky top-0 z-50 border-b border-stone-200 bg-white/90 backdrop-blur-md dark:border-stone-800 dark:bg-stone-900/90">

        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">

            <a href="{{ route('home') }}" class="text-xl font-bold tracking-wide text-amber-800 dark:text-amber-500">
                WYE BREAD HOUSE
            </a>

            <nav class="flex flex-wrap items-center gap-3 sm:gap-5 text-sm">
                
                <!-- Enlaces Públicos -->
                <a href="{{ route('home') }}" class="font-medium text-stone-600 transition hover:text-amber-800 dark:text-stone-300 dark:hover:text-amber-400">
                    Inicio
                </a>
                <a href="{{ url('/#categorias') }}" class="hidden sm:inline font-medium text-stone-600 transition hover:text-amber-800 dark:text-stone-300 dark:hover:text-amber-400 scroll-smooth">
                    Catálogo
                </a>
                <a href="{{ url('/#contacto') }}" class="hidden sm:inline font-medium text-stone-600 transition hover:text-amber-800 dark:text-stone-300 dark:hover:text-amber-400 scroll-smooth">
                    Contacto
                </a>

                <span class="hidden sm:inline text-stone-300 dark:text-stone-700">|</span>

                <!-- Botón de Tema -->
                <button id="theme-toggle" type="button" class="rounded-lg border border-stone-200 px-3 py-2 text-xs sm:text-sm font-medium text-stone-700 transition hover:bg-stone-100 dark:border-stone-600 dark:text-stone-200 dark:hover:bg-stone-700">
                    Oscuro
                </button>

                <!-- Lógica de Sesión -->
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="font-medium text-amber-700 transition hover:text-amber-900 dark:text-amber-400 dark:hover:text-amber-300">
                        Ir al Panel
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="inline-flex">
                        @csrf
                        <button type="submit" class="rounded-lg bg-stone-100 px-3 py-2 text-xs sm:text-sm font-medium text-stone-700 transition hover:bg-stone-200 dark:bg-stone-800 dark:text-stone-300 dark:hover:bg-stone-700">
                            Salir
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="rounded-lg bg-amber-800 px-3 py-2 text-xs sm:text-sm font-medium text-white transition hover:bg-amber-900">
                        Iniciar sesión
                    </a>
                @endauth

            </nav>
        </div>
    </header>
    @endif

    <!-- 
      NOTA: Asegúrate de que tus vistas home.blade.php y contact.blade.php 
      utilicen @section('content') para que el contenido se inyecte aquí.
    -->
    <main class="mx-auto w-full max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <footer class="mt-12 border-t border-stone-200 bg-white dark:border-stone-800 dark:bg-stone-900">
        <div class="mx-auto max-w-7xl px-4 py-8 text-center text-sm text-stone-500 sm:px-6 lg:px-8">
            <p>&copy; {{ date('Y') }} WYE BREAD HOUSE. Todos los derechos reservados.</p>
            <p class="mt-2 text-xs">Proyecto de Desarrollo Web - Ingeniería en Sistemas</p>
        </div>
    </footer>

</body>
</html>