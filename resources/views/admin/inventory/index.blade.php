@extends('layouts.admin')

@section('title', 'Historial de Inventario')

@section('page-title', 'Historial de Inventario')

@section('admin-content')
<div class="space-y-6">

    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-lg font-semibold text-amber-950 dark:text-amber-200">
                Movimientos de Inventario
            </h2>
            <p class="mt-1 text-sm text-stone-600 dark:text-stone-300">
                Registro histórico de todas las entradas y salidas de productos.
            </p>
        </div>

        <a href="{{ route('admin.inventory.create') }}"
            class="inline-flex items-center justify-center rounded-lg bg-amber-800 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-amber-900 focus:outline-none focus:ring-2 focus:ring-amber-700 focus:ring-offset-2">
            + Registrar movimiento
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

    <div class="overflow-hidden rounded-xl border border-stone-200 bg-white shadow-sm dark:border-stone-700 dark:bg-stone-900">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px] text-left text-sm">
                <thead class="bg-stone-100 text-xs uppercase tracking-wider text-stone-600 dark:bg-stone-800 dark:text-stone-300">
                    <tr class="transition hover:bg-stone-50 dark:hover:bg-stone-800">
                        <th scope="col" class="px-5 py-4 font-semibold">Fecha</th>
                        <th scope="col" class="px-5 py-4 font-semibold">Producto</th>
                        <th scope="col" class="px-5 py-4 font-semibold">Tipo</th>
                        <th scope="col" class="px-5 py-4 font-semibold">Cantidad</th>
                        <th scope="col" class="px-5 py-4 font-semibold">Motivo</th>
                        <th scope="col" class="px-5 py-4 font-semibold">Registrado por</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-stone-100 dark:divide-stone-700">
                    @forelse ($movements as $movement)
                    <tr class="transition hover:bg-stone-50 dark:hover:bg-stone-800">
                        <td class="px-5 py-4 text-stone-500 dark:text-stone-400">
                            {{ $movement->created_at ? $movement->created_at->format('d/m/Y H:i') : 'N/A' }}
                        </td>

                        <td class="px-5 py-4 font-medium text-stone-900 dark:text-stone-100">
                            {{ $movement->product->name ?? 'Producto eliminado' }}
                        </td>

                        <td class="px-5 py-4">
                            @if(strtolower($movement->type) === 'entrada')
                                <span class="inline-flex rounded-full bg-green-100 px-2.5 py-1 text-xs font-semibold text-green-800 dark:bg-green-950 dark:text-green-300">
                                    Entrada
                                </span>
                            @else
                                <span class="inline-flex rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-800 dark:bg-red-950 dark:text-red-300">
                                    Salida
                                </span>
                            @endif
                        </td>

                        <td class="px-5 py-4 font-semibold {{ strtolower($movement->type) === 'entrada' ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                            {{ strtolower($movement->type) === 'entrada' ? '+' : '-' }}{{ $movement->quantity }}
                        </td>

                        <td class="px-5 py-4 text-stone-600 dark:text-stone-300">
                            {{ $movement->reason }}
                        </td>

                        <td class="px-5 py-4 text-stone-500 dark:text-stone-400 text-xs">
                            {{ $movement->user->name ?? 'Sistema' }}
                        </td>
                    </tr>
                    @empty
                    <tr class="transition hover:bg-stone-50 dark:hover:bg-stone-800">
                        <td colspan="6" class="px-5 py-10 text-center text-stone-500 dark:text-stone-300">
                            Aún no se han registrado movimientos de inventario.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($movements->hasPages())
        <div class="border-t border-stone-200 px-5 py-4 dark:border-stone-700">
            {{ $movements->links() }}
        </div>
        @endif
    </div>
</div>
@endsection