<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')]
class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(
            default: route('dashboard', absolute: false),
            navigate: true
        );
    }
};

?>

<div class="min-h-screen flex items-center justify-center bg-login-pattern bg-cover bg-center">
    <div class="bg-white/20 backdrop-blur-md rounded-xl p-8 w-full max-w-md shadow-lg">
        <h1 class="text-white text-2xl font-bold mb-6 text-center">
            Sistema de Gestão
        </h1>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form wire:submit="login">
            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('E-mail')" class="text-white" />

                <x-text-input
                    wire:model="form.email"
                    id="email"
                    class="block mt-1 w-full rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    type="email"
                    name="email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <x-input-error :messages="$errors->get('form.email')" class="mt-2 text-red-400" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Senha')" class="text-white" />

                <x-text-input
                    wire:model="form.password"
                    id="password"
                    class="block mt-1 w-full rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                />

                <x-input-error :messages="$errors->get('form.password')" class="mt-2 text-red-400" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-6">
                <input
                    wire:model="form.remember"
                    id="remember"
                    type="checkbox"
                    class="rounded text-blue-600 focus:ring-blue-500"
                    name="remember"
                >
                <label for="remember" class="ml-2 text-white text-sm">Lembre de mim</label>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col items-center">
                <x-primary-button
                    class="w-full bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-bold py-2 px-4 rounded-md mb-3"
                >
                    CONECTE-SE
                </x-primary-button>

                @if (Route::has('password.request'))
                    <a
                        class="text-sm text-blue-200 hover:text-blue-400"
                        href="{{ route('password.request') }}"
                        wire:navigate
                    >
                        Esqueceu sua senha?
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
