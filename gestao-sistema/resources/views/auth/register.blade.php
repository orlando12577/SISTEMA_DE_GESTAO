<x-guest-layout>
    <div class="w-full max-w-md bg-white/95 backdrop-blur-sm rounded-xl shadow-xl p-6 sm:p-6 relative">

        <!-- Botão Voltar (canto superior esquerdo) -->
        <a href="{{ url('/') }}"
           class="absolute top-4 left-4 bg-gray-600 hover:bg-gray-700 text-white font-semibold px-3 py-1 rounded-md transition text-sm flex items-center">
            ← Voltar
        </a>

        <h2 class="text-xl font-bold text-center text-gray-800 mb-4 mt-8">Crie sua conta</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nome -->
            <div class="mb-3">
                <x-input-label for="name" :value="__('Nome')" class="text-gray-700 font-semibold text-sm" />
                <x-text-input id="name" class="w-full mt-1 px-3 py-1.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition text-sm" 
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-red-500" />
            </div>

            <!-- E-mail -->
            <div class="mb-3">
                <x-input-label for="email" :value="__('E-mail')" class="text-gray-700 font-semibold text-sm" />
                <x-text-input id="email" class="w-full mt-1 px-3 py-1.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition text-sm" 
                    type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-500" />
            </div>

            <!-- Senha -->
            <div class="mb-3">
                <x-input-label for="password" :value="__('Senha')" class="text-gray-700 font-semibold text-sm" />
                <x-text-input id="password" class="w-full mt-1 px-3 py-1.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition text-sm"
                    type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-500" />
            </div>

            <!-- Confirmar senha -->
            <div class="mb-3">
                <x-input-label for="password_confirmation" :value="__('Confirmar senha')" class="text-gray-700 font-semibold text-sm" />
                <x-text-input id="password_confirmation" class="w-full mt-1 px-3 py-1.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition text-sm"
                    type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-red-500" />
            </div>

            <!-- Já tem conta + botão -->
            <div class="flex items-center justify-between mt-4">
                <a class="text-xs text-indigo-600 hover:underline" href="{{ route('login') }}">
                    Já tem uma conta?
                </a>

                <x-primary-button class="bg-indigo-600 text-white py-1.5 rounded-md hover:bg-indigo-700 transition font-semibold text-sm">
                    {{ __('Cadastrar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
