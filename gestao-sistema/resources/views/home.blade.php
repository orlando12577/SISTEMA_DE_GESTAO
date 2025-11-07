<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo | Sistema de Gestão</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-cover bg-center"
      style="background-image: url('{{ asset('images/bg-futurista.png') }}');">

    <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl shadow-2xl text-center px-10 py-8 max-w-xl">
        <h1 class="text-3xl font-bold text-white mb-6 drop-shadow-lg">
            Bem-vindo ao Sistema de Gestão
        </h1>

        <div class="flex justify-center gap-4">
            <a href="{{ route('login') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition">
               Login
            </a>

            <a href="{{ route('register') }}"
               class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg transition">
               Registrar-se
            </a>
        </div>
    </div>

</body>
</html>
