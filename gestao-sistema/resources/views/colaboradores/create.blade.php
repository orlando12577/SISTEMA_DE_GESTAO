@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-900">
    <div class="bg-white shadow-2xl rounded-2xl p-8 w-full max-w-lg">

        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6 border-b pb-3">
            Novo Colaborador
        </h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('colaboradores.store') }}" method="POST" class="space-y-5 text-gray-800">
            @csrf

            <div>
                <label for="nome" class="block font-semibold mb-1 text-gray-900">Nome</label>
                <input type="text" name="nome" id="nome"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-300 focus:outline-none text-black"
                    placeholder="Digite o nome completo" value="{{ old('nome') }}" required>
            </div>

            <div>
                <label for="email" class="block font-semibold mb-1 text-gray-900">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-300 focus:outline-none text-black"
                    placeholder="exemplo@dominio.com" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="cpf" class="block font-semibold mb-1 text-gray-900">CPF</label>
                <input type="text" name="cpf" id="cpf"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-300 focus:outline-none text-black"
                    placeholder="000.000.000-00" value="{{ old('cpf') }}" required>
            </div>

            <div>
                <label for="unidade_id" class="block font-semibold mb-1 text-gray-900">Unidade</label>
                <select name="unidade_id" id="unidade_id"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-300 focus:outline-none text-black" required>
                    <option value="">Selecione</option>
                    @foreach($unidades as $unidade)
                        <option value="{{ $unidade->id }}" {{ old('unidade_id') == $unidade->id ? 'selected' : '' }}>
                            {{ $unidade->nome_fantasia }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('colaboradores.index') }}"
                   class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-4 py-2 rounded-lg transition">
                    Voltar
                </a>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg transition">
                    Salvar
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
