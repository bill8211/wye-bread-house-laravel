
@extends('layouts.admin')

@section('title', 'Crear usuario')
@section('page-title', 'Crear usuario')

@section('admin-content')
    <div class="mx-auto max-w-3xl space-y-6">

        <div>
            <h2 class="text-lg font-semibold text-stone-900 dark:text-stone-100">
                Registrar una nueva cuenta
            </h2>

            <p class="mt-1 text-sm text-stone-600 dark:text-stone-400">
                Completa los datos para crear una cuenta en WYE BREAD HOUSE.
            </p>
        </div>

        @if ($errors->any())
            <div
                role="alert"
                class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800 dark:border-red-900 dark:bg-red-950 dark:text-red-200"
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

        <div class="rounded-xl border border-stone-200 bg-white p-5 shadow-sm dark:border-stone-700 dark:bg-stone-900 sm:p-7">

            <form
                method="POST"
                action="{{ route('admin.users.store') }}"
                class="space-y-5"
            >
                @csrf

                <div>
                    <label
                        for="name"
                        class="mb-2 block text-sm font-medium text-stone-700 dark:text-stone-200"
                    >
                        Nombre completo
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        maxlength="255"
                        autocomplete="name"
                        required
                        class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2.5 text-sm text-stone-900 outline-none transition placeholder:text-stone-400 focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100"
                    >

                    @error('name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

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
                        maxlength="255"
                        autocomplete="email"
                        required
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
                        for="role"
                        class="mb-2 block text-sm font-medium text-stone-700 dark:text-stone-200"
                    >
                        Rol
                    </label>

                    <select
                        id="role"
                        name="role"
                        required
                        class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2.5 text-sm text-stone-900 outline-none transition focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100"
                    >
                        <option value="">Selecciona un rol</option>

                        <option value="admin" @selected(old('role') === 'admin')>
                            Administrador
                        </option>

                        <option value="employee" @selected(old('role') === 'employee')>
                            Empleado
                        </option>

                        <option value="client" @selected(old('role') === 'client')>
                            Cliente
                        </option>
                    </select>

                    @error('role')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                    @enderror

                    <p class="mt-1 text-xs text-stone-500 dark:text-stone-400">
                        El rol determina el tipo de cuenta que tendrá el usuario.
                    </p>
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
                        minlength="8"
                        required
                        autocomplete="new-password"
                        class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2.5 text-sm text-stone-900 outline-none transition focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100"
                    >

                    @error('password')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                    @enderror

                    <p class="mt-1 text-xs text-stone-500 dark:text-stone-400">
                        La contraseña debe tener al menos 8 caracteres.
                    </p>
                </div>

                <div>
                    <label
                        for="password_confirmation"
                        class="mb-2 block text-sm font-medium text-stone-700 dark:text-stone-200"
                    >
                        Confirmar contraseña
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        minlength="8"
                        required
                        autocomplete="new-password"
                        class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2.5 text-sm text-stone-900 outline-none transition focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100"
                    >
                </div>

                <div class="flex flex-col-reverse gap-3 border-t border-stone-200 pt-5 dark:border-stone-700 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('admin.users.index') }}"
                        class="inline-flex items-center justify-center rounded-lg border border-stone-300 px-4 py-2.5 text-sm font-semibold text-stone-700 transition hover:bg-stone-100 dark:border-stone-600 dark:text-stone-200 dark:hover:bg-stone-800"
                    >
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-lg bg-amber-800 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-amber-900 focus:outline-none focus:ring-2 focus:ring-amber-700 focus:ring-offset-2 dark:focus:ring-offset-stone-900"
                    >
                        Crear usuario
                    </button>

                </div>
            </form>
        </div>
    </div>
@endsection
