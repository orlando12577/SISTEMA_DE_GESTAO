<x-guest-layout>
    <div class="w-full max-w-md bg-white/95 backdrop-blur-sm rounded-xl shadow-xl p-6 sm:p-6 relative">

        <!-- Botão Voltar (canto superior esquerdo) -->
        <a href="{{ url('/') }}"
           class="absolute top-4 left-4 bg-gray-600 hover:bg-gray-700 text-white font-semibold px-3 py-1 rounded-md transition text-sm flex items-center">
            ← Voltar
        </a>

        <h2 class="text-xl font-bold text-center text-gray-800 mb-4 mt-8">Acesse sua conta</h2>

        <x-auth-session-status class="mb-3" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <x-input-label for="email" :value="__('E-mail')" class="text-gray-700 font-semibold text-sm" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                    class="w-full mt-1 px-3 py-1.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition text-sm" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-500" />
            </div>

            <div class="mb-3">
                <x-input-label for="password" :value="__('Senha')" class="text-gray-700 font-semibold text-sm" />
                <x-text-input id="password" type="password" name="password" required
                    class="w-full mt-1 px-3 py-1.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition text-sm" />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-500" />
            </div>

            <div class="flex items-center justify-between mb-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="h-3.5 w-3.5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-xs text-gray-600">Lembrar de mim</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-xs text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                        Esqueceu sua senha?
                    </a>
                @endif
            </div>

            <x-primary-button
                class="w-full bg-indigo-600 text-white py-1.5 rounded-md hover:bg-indigo-700 transition font-semibold text-sm text-center justify-center">
                {{ __('Entrar') }}
            </x-primary-button>
        </form>
    </div>
</x-guest-layout>
