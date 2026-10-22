@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-3xl px-4 py-12 sm:px-6 lg:px-8">
    <div class="text-center">
        <h1 class="text-3xl font-bold tracking-tight text-amber-950 dark:text-amber-200">Contacto</h1>
        <p class="mt-4 text-lg text-stone-600 dark:text-stone-300">
            ¿Tienes alguna consulta sobre nuestros productos o pedidos especiales? Escríbenos y te responderemos a la brevedad.
        </p>
    </div>

    <div class="mt-12 overflow-hidden rounded-xl border border-stone-200 bg-white shadow-sm dark:border-stone-700 dark:bg-stone-900">
        
        @if (session('success'))
        <div class="border-b border-green-200 bg-green-50 p-6 text-center dark:border-green-900 dark:bg-green-950/50">
            <h3 class="text-lg font-medium text-green-800 dark:text-green-300">¡Mensaje enviado!</h3>
            <p class="mt-2 text-sm text-green-700 dark:text-green-400">{{ session('success') }}</p>
        </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" class="p-6 sm:p-8">
            @csrf
            
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <!-- Nombre -->
                <div>
                    <label for="sender_name" class="mb-1 block text-sm font-medium text-stone-700 dark:text-stone-300">Nombre completo <span class="text-red-500">*</span></label>
                    <input type="text" name="sender_name" id="sender_name" value="{{ old('sender_name') }}" required
                        class="block w-full rounded-lg border-stone-300 bg-white px-4 py-2.5 text-sm text-stone-900 focus:border-amber-500 focus:ring-amber-500 dark:border-stone-600 dark:bg-stone-800 dark:text-white">
                    @error('sender_name') <span class="mt-1 text-xs text-red-600">{{ $message }}</span> @enderror
                </div>

                <!-- Correo -->
                <div>
                    <label for="sender_email" class="mb-1 block text-sm font-medium text-stone-700 dark:text-stone-300">Correo electrónico <span class="text-red-500">*</span></label>
                    <input type="email" name="sender_email" id="sender_email" value="{{ old('sender_email') }}" required
                        class="block w-full rounded-lg border-stone-300 bg-white px-4 py-2.5 text-sm text-stone-900 focus:border-amber-500 focus:ring-amber-500 dark:border-stone-600 dark:bg-stone-800 dark:text-white">
                    @error('sender_email') <span class="mt-1 text-xs text-red-600">{{ $message }}</span> @enderror
                </div>

 <!-- Asunto -->
                <div>
                    <label for="subject" class="mb-2 block text-sm font-medium text-stone-700 dark:text-stone-200">Asunto</label>
                    @php
                        $defaultSubject = request('producto') ? 'Pedido: ' . request('producto') : '';
                    @endphp
                    <input type="text" id="subject" name="subject" value="{{ old('subject', $defaultSubject) }}" maxlength="255" required placeholder="¿En qué podemos ayudarte?" class="w-full rounded-lg border border-stone-300 bg-white px-4 py-3 text-sm text-stone-900 outline-none transition focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100">
                </div>
                
                <!-- Mensaje -->
                <div>
                    <label for="message" class="mb-2 block text-sm font-medium text-stone-700 dark:text-stone-200">Mensaje</label>
                    @php
                        $defaultMessage = request('producto') ? 'Hola, me gustaría solicitar 1 unidad de ' . request('producto') . '. Para esta tarde.' : '';
                    @endphp
                    <textarea id="message" name="message" rows="5" minlength="10" maxlength="5000" required placeholder="Escribe aquí tu mensaje..." class="w-full resize-y rounded-lg border border-stone-300 bg-white px-4 py-3 text-sm text-stone-900 outline-none transition focus:border-amber-700 focus:ring-2 focus:ring-amber-700/20 dark:border-stone-600 dark:bg-stone-800 dark:text-stone-100">{{ old('message', $defaultMessage) }}</textarea>
                </div>

            <div class="mt-8 text-right">
                <button type="submit"
                    class="inline-flex w-full items-center justify-center rounded-lg bg-amber-800 px-6 py-3 text-sm font-semibold text-white transition hover:bg-amber-900 focus:outline-none focus:ring-2 focus:ring-amber-700 focus:ring-offset-2 sm:w-auto">
                    Enviar mensaje
                </button>
            </div>
        </form>
    </div>
</div>
@endsection