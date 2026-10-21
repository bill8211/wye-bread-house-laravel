@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
    <div class="flex min-h-[65vh] items-center justify-center py-8">
        <div class="w-full max-w-md">

            <div class="mb-6 text-center">
                <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-amber-100 text-amber-900 dark:bg-amber-950 dark:text-amber-300">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="34"
                        height="34"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.6"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <path d="M4 10h16v10H4z"/>
                        <path d="M3 10a9 9 0 0 1 18 0"/>
                        <path d="M8 14v2"/>
                        <path d="M12 14v2"/>
                        <path d="M16 14v2"/>
                    </svg>
                </div>

                <h1 class="text-2xl font-bold tracking-tight text-stone-900 dark:text-stone-100">
                    WYE BREAD HOUSE
                </h1>

                <p class="mt-2 text-sm text-stone-600 dark:text-stone-400">
                    Inicia sesión para acceder al sistema.
                </p>
            </div>

            <div class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm dark:border-stone-700 dark:bg-stone-900 sm:p-8">

                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-stone-900 dark:text-stone-100">
                        Iniciar sesión
                    </h2>

                    <p class="mt-1 text-sm text-stone-600 dark:text-stone-400">
                        Introduce los datos de tu cuenta.
                    </p>
                </div>

                @if (session('status'))
                    <div
                        role="status"
                        class="mb-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800 dark:border-green-900 dark:bg-green-950 dark:text-green-200"
                    >
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div
                        role="alert"
                        class="mb-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800 dark:border-red-900 dark:bg-red-950 dark:text-red-200"
                    >
                        <p class="font-semibold">
                            No se pudo iniciar sesión.
                        </p>

                        <ul class="mt-2 list-inside list-disc space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label
                            for="email"
                            class="mb-2 block text-sm font-medium text-stone-700 dark:text-stone-200"
                        >
                            Correo electrónico
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            autofocus
                            class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2.5 text-sm text-stone-900 outline-none transition focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100"
                        >

                        @error('email')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label
                            for="password"
                            class="mb-2 block text-sm font-medium text-stone-700 dark:text-stone-200"
                        >
                            Contraseña
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2.5 text-sm text-stone-900 outline-none transition focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100"
                        >

                        @error('password')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            id="remember"
                            name="remember"
                            value="1"
                            @checked(old('remember'))
                            class="h-4 w-4 rounded border-stone-300 text-amber-800 focus:ring-amber-700 dark:border-stone-600 dark:bg-stone-800"
                        >

                        <label
                            for="remember"
                            class="ml-2 text-sm text-stone-600 dark:text-stone-300"
                        >
                            Mantener la sesión iniciada
                        </label>
                    </div>

                    <button
                        type="submit"
                        class="w-full rounded-lg bg-amber-800 px-4 py-3 text-sm font-semibold text-white transition hover:bg-amber-900 focus:outline-none focus:ring-2 focus:ring-amber-700 focus:ring-offset-2 dark:focus:ring-offset-stone-900"
                    >
                        Ingresar
                    </button>
                </form>

                <div class="mt-5 text-center">
                    <a
                        href="{{ route('password.request') }}"
                        class="text-sm font-medium text-amber-800 transition hover:text-amber-900 hover:underline dark:text-amber-400 dark:hover:text-amber-300"
                    >
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
            </div>

            <p class="mt-6 text-center text-sm text-stone-500 dark:text-stone-400">
                ¿Necesitas una cuenta? Contacta al administrador.
            </p>

            <div class="mt-4 text-center">
                <a
                    href="{{ route('home') }}"
                    class="text-sm font-medium text-stone-600 transition hover:text-amber-800 dark:text-stone-400 dark:hover:text-amber-400"
                >
                    ← Volver al inicio
                </a>
            </div>

        </div>
    </div>
@endsection
