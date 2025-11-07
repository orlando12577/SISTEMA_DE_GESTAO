<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Login') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased min-h-screen flex items-center justify-center bg-[#0f172a]">
    <!-- Fundo azul escuro cobrindo toda a tela -->
    <div class="w-full flex items-center justify-center min-h-screen bg-[#0f172a]">
        <!-- Aqui entra o conteúdo (login / register) -->
        {{ $slot }}
    </div>
</body>
</html>
