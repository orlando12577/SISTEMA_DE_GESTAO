@extends('layouts.app')

@section('content')
<div class="text-center mt-20">
    <h1 class="text-3xl font-bold mb-4">Bem-vindo ao Sistema de Gestão</h1>

    @guest
        <a href="{{ route('login') }}" class="px-6 py-2 bg-blue-600 text-white rounded mr-2">Login</a>
        <a href="{{ route('register') }}" class="px-6 py-2 bg-green-600 text-white rounded">Registrar-se</a>
    @else
        <div class="grid grid-cols-2 gap-4 max-w-lg mx-auto">
            <a href="{{ route('grupos.index') }}" class="px-4 py-2 bg-gray-200 rounded">Grupos Econômicos</a>
            <a href="{{ route('bandeiras.index') }}" class="px-4 py-2 bg-gray-200 rounded">Bandeiras</a>
            <a href="{{ route('unidades.index') }}" class="px-4 py-2 bg-gray-200 rounded">Unidades</a>
            <a href="{{ route('colaboradores.index') }}" class="px-4 py-2 bg-gray-200 rounded">Colaboradores</a>
        </div>
    @endguest
</div>
@endsection
