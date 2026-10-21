@extends('layouts.admin')

@section('title', 'Bandeja de Mensajes')

@section('page-title', 'Bandeja de Mensajes')

@section('admin-content')
<div class="space-y-6">

    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-lg font-semibold text-amber-950 dark:text-amber-200">
                Mensajes de Contacto
            </h2>
            <p class="mt-1 text-sm text-stone-600 dark:text-stone-300">
                Buzón de consultas, sugerencias o requerimientos enviados por los clientes.
            </p>
        </div>
    </div>

    @if (session('success'))
    <div role="status"
        class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800 dark:border-green-900 dark:bg-green-950 dark:text-green-200">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-hidden rounded-xl border border-stone-200 bg-white shadow-sm dark:border-stone-700 dark:bg-stone-900">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px] text-left text-sm">
                <thead class="bg-stone-100 text-xs uppercase tracking-wider text-stone-600 dark:bg-stone-800 dark:text-stone-300">
                    <tr class="transition hover:bg-stone-50 dark:hover:bg-stone-800">
                        <th scope="col" class="px-5 py-4 font-semibold w-1/4">Remitente</th>
                        <th scope="col" class="px-5 py-4 font-semibold w-1/4">Asunto</th>
                        <th scope="col" class="px-5 py-4 font-semibold w-1/3">Mensaje</th>
                        <th scope="col" class="px-5 py-4 font-semibold text-center">Estado</th>
                        <th scope="col" class="px-5 py-4 font-semibold">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-stone-100 dark:divide-stone-700">
                    @forelse ($messages as $message)
                    <tr class="transition hover:bg-stone-50 dark:hover:bg-stone-800 {{ $message->status === 'pendiente' ? 'bg-amber-50/50 dark:bg-amber-950/10' : '' }}">
                        
                        <td class="px-5 py-4">
                            <p class="font-medium text-stone-900 dark:text-stone-100">{{ $message->sender_name }}</p>
                            <a href="mailto:{{ $message->sender_email }}" class="text-xs text-amber-600 hover:underline dark:text-amber-400">{{ $message->sender_email }}</a>
                            <p class="mt-1 text-[10px] text-stone-400">{{ $message->created_at->format('d/m/Y H:i') }}</p>
                        </td>

                        <td class="px-5 py-4 font-medium text-stone-800 dark:text-stone-200">
                            {{ $message->subject }}
                        </td>

                        <td class="px-5 py-4 text-stone-600 dark:text-stone-300 text-xs whitespace-pre-wrap">{{ $message->message }}</td>

                        <td class="px-5 py-4 text-center">
                            @if ($message->status === 'pendiente')
                            <span class="inline-flex rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-800 dark:bg-amber-900/50 dark:text-amber-300 border border-amber-200 dark:border-amber-800">
                                Pendiente
                            </span>
                            @else
                            <span class="inline-flex rounded-full bg-green-100 px-2.5 py-1 text-xs font-semibold text-green-800 dark:bg-green-950 dark:text-green-300">
                                Atendido
                            </span>
                            @if($message->user)
                                <p class="mt-1 text-[10px] text-stone-400">Por: {{ $message->user->name }}</p>
                            @endif
                            @endif
                        </td>

                        <td class="px-5 py-4">
                            @if ($message->status === 'pendiente')
                            <form method="POST" action="{{ route('admin.contacts.mark-attended', $message) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="rounded-lg border border-green-200 px-3 py-2 text-xs font-semibold text-green-700 transition hover:bg-green-50 dark:border-green-900 dark:text-green-400 dark:hover:bg-green-950/50">
                                    Marcar Atendido
                                </button>
                            </form>
                            @else
                            <span class="text-xs text-stone-400 italic">Sin acciones</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr class="transition hover:bg-stone-50 dark:hover:bg-stone-800">
                        <td colspan="5" class="px-5 py-10 text-center text-stone-500 dark:text-stone-300">
                            El buzón está vacío. No hay mensajes de contacto.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($messages->hasPages())
        <div class="border-t border-stone-200 px-5 py-4 dark:border-stone-700">
            {{ $messages->links() }}
        </div>
        @endif
    </div>
</div>
@endsection