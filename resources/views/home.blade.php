<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WYE BREAD HOUSE</title>
</head>
<body>
    <header>
        <h1>WYE BREAD HOUSE</h1>
        <p>Panadería y repostería</p>

        <nav>
            @auth
                <span>Bienvenido, {{ auth()->user()->name }}</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            @else
                <a href="{{ route('login') }}">Iniciar sesión</a>
            @endauth
        </nav>
    </header>

    <main>
        <h2>El sabor de lo recién horneado</h2>

        <p>
            Descubre nuestros panes tradicionales, panes dulces,
            pasteles y productos de repostería.
        </p>

        @auth
            @if (auth()->user()->role === 'admin')
                <p>Has iniciado sesión como administrador.</p>
            @elseif (auth()->user()->role === 'employee')
                <p>Has iniciado sesión como empleado.</p>
            @elseif (auth()->user()->role === 'client')
                <p>Has iniciado sesión como cliente.</p>
            @endif
        @endauth
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} WYE BREAD HOUSE</p>
    </footer>
</body>
</html>
