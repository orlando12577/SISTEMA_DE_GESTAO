@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-900">
    <div class="bg-white shadow-2xl rounded-2xl p-8 w-full max-w-lg">

        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6 border-b pb-3">
            Criar Novo Grupo Econômico
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

        <form action="{{ route('grupos.store') }}" method="POST" class="space-y-5 text-gray-800">
            @csrf

            <div>
                <label for="nome" class="block font-semibold mb-1 text-gray-900">Nome</label>
                <input type="text" name="nome" id="nome"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-300 focus:outline-none text-black"
                    placeholder="Digite o nome do grupo" value="{{ old('nome') }}" required>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('grupos.index') }}"
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
