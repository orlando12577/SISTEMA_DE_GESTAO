<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Sistema de Gestão') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#0f172a] text-white min-h-screen">

    <!-- Navbar -->
    <nav class="bg-[#111827] p-3 flex justify-between items-center shadow-md">
        <div class="flex items-center space-x-6">
            <h1 class="text-lg font-bold text-white">Sistema de Gestão</h1>

            <!-- Links simples -->
            <a href="{{ route('unidades.index') }}" class="hover:text-blue-400 transition">🏢 Unidades</a>
            <a href="{{ route('grupos.index') }}" class="hover:text-blue-400 transition">💼 Grupos</a>
            <a href="{{ route('bandeiras.index') }}" class="hover:text-blue-400 transition">🚩 Bandeiras</a>
            <a href="{{ route('colaboradores.index') }}" class="hover:text-blue-400 transition">👥 Colaboradores</a>
        </div>

        <!-- Logout -->
        <div>
            @auth
                <span class="mr-4 text-gray-300">Olá, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-red-400 hover:text-red-600 transition">Sair</button>
                </form>
            @endauth
        </div>
    </nav>

    <!-- Conteúdo -->
    <div class="p-6">
        @yield('content')
    </div>

</body>
</html>
