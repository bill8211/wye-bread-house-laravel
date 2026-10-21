@extends('layouts.admin')

@section('title', 'Gestión de usuarios')

@section('page-title', 'Gestión de usuarios')

@section('admin-content')
<div class="space-y-6">

    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-lg font-semibold text-amber-950 dark:text-amber-200">
                Usuarios registrados
            </h2>

            <p class="mt-1 text-sm text-stone-600 dark:text-stone-300">
                Administra las cuentas y los permisos de acceso al sistema.
            </p>
        </div>

        <a href="{{ route('admin.users.create') }}"
            class="inline-flex items-center justify-center rounded-lg bg-amber-800 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-amber-900 focus:outline-none focus:ring-2 focus:ring-amber-700 focus:ring-offset-2">
            + Crear usuario
        </a>
    </div>

    @if (session('success'))
    <div role="status"
        class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800 dark:border-green-900 dark:bg-green-950 dark:text-green-200">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div role="alert"
        class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800 dark:border-red-900 dark:bg-red-950 dark:text-red-200">
        {{ session('error') }}
    </div>
    @endif

    <div
        class="overflow-hidden rounded-xl border border-stone-200 bg-white shadow-sm dark:border-stone-700 dark:bg-stone-900">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[650px] text-left text-sm">
                <thead
                    class="bg-stone-100 text-xs uppercase tracking-wider text-stone-600 dark:bg-stone-800 dark:text-stone-300">
                    <tr
                        class="transition hover:bg-stone-50 dark:hover:bg-stone-800">
                        <th scope="col" class="px-5 py-4 font-semibold">
                            Nombre
                        </th>

                        <th scope="col" class="px-5 py-4 font-semibold">
                            Correo electrónico
                        </th>

                        <th scope="col" class="px-5 py-4 font-semibold">
                            Rol
                        </th>

                        <th scope="col" class="px-5 py-4 font-semibold">
                            Estado
                        </th>

                        <th scope="col" class="px-5 py-4 font-semibold">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody
                    class="divide-y divide-stone-100 dark:divide-stone-700">
                    @forelse ($users as $user)
                    <tr
                        class="transition hover:bg-stone-50 dark:hover:bg-stone-800">
                        <td
                            class="px-5 py-4 font-medium text-stone-900 dark:text-stone-100">
                            {{ $user->name }}
                        </td>

                        <td
                            class="px-5 py-4 text-stone-600 dark:text-stone-300">
                            {{ $user->email }}
                        </td>

                        <td class="px-5 py-4">
                            @if ($user->role === 'admin')
                            Administrador
                            @elseif ($user->role === 'employee')
                            Empleado
                            @else
                            Cliente
                            @endif
                        </td>

                        <td class="px-5 py-4">
                            @if ($user->is_active)
                            <span class="inline-flex rounded-full bg-green-100 px-2.5 py-1 text-xs font-semibold text-green-800 dark:bg-green-950 dark:text-green-300">
                                Activo
                            </span>
                            @else
                            <span class="inline-flex rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-800 dark:bg-red-950 dark:text-red-300">
                                Inactivo
                            </span>
                            @endif
                        </td>

                        <td class="px-5 py-4">
                            @if ($user->getAuthIdentifier() == auth()->user()->getAuthIdentifier())
                            <span class="text-xs text-stone-500">
                                Cuenta actual
                            </span>
                            @else
                            <form method="POST"
                                action="{{ route('admin.users.toggle-status', $user) }}">
                                @csrf
                                @method('PATCH')

                                @if ($user->is_active)
                                <button type="submit"
                                    class="rounded-lg border border-red-200 px-3 py-2 text-xs font-semibold text-red-700 transition hover:bg-red-50">
                                    Desactivar
                                </button>
                                @else
                                <button type="submit"
                                    class="rounded-lg border border-green-200 px-3 py-2 text-xs font-semibold text-green-700 transition hover:bg-green-50">
                                    Activar
                                </button>
                                @endif
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr
                        class="transition hover:bg-stone-50 dark:hover:bg-stone-800">
                        <td colspan="5" class="px-5 py-10 text-center text-stone-500 dark:text-stone-300">
                            No hay usuarios registrados.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($users->hasPages())
        <div class="border-t border-stone-200 px-5 py-4">
            {{ $users->links() }}
        </div>
        @endif
    </div>

    <p class="text-sm text-stone-500 dark:text-stone-300">
        Total de usuarios en esta página: {{ $users->count() }}
    </p>

</div>
@endsection