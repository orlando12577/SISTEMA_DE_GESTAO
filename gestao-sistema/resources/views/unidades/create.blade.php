@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-900">
    <div class="bg-white shadow-2xl rounded-2xl p-8 w-full max-w-lg">
        
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6 border-b pb-3">
            Nova Unidade
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

        <form action="{{ route('unidades.store') }}" method="POST" class="space-y-5 text-gray-800">
            @csrf

            <div>
                <label for="nome_fantasia" class="block font-semibold mb-1 text-gray-900">Nome</label>
                <input type="text" name="nome_fantasia" id="nome_fantasia"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-300 focus:outline-none text-black"
                    placeholder="Digite o nome da unidade" value="{{ old('nome_fantasia') }}" required>
            </div>

            <div>
                <label for="razao_social" class="block font-semibold mb-1 text-gray-900">Razão Social</label>
                <input type="text" name="razao_social" id="razao_social"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-300 focus:outline-none text-black"
                    placeholder="Digite a razão social" value="{{ old('razao_social') }}" required>
            </div>

            <div>
                <label for="cnpj" class="block font-semibold mb-1 text-gray-900">CNPJ</label>
                <input type="text" name="cnpj" id="cnpj"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-300 focus:outline-none text-black"
                    placeholder="00.000.000/0000-00" value="{{ old('cnpj') }}" required>
            </div>

            <div>
                <label for="bandeira_id" class="block font-semibold mb-1 text-gray-900">Bandeira</label>
                <select name="bandeira_id" id="bandeira_id" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-300 focus:outline-none text-black bg-white" required>
                    <option value="">Selecione uma bandeira</option>
                    @foreach($bandeiras as $bandeira)
                        <option value="{{ $bandeira->id }}" {{ old('bandeira_id') == $bandeira->id ? 'selected' : '' }}>
                            {{ $bandeira->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('unidades.index') }}"
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
