@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 relative">

            <!-- Botão Voltar -->
            <a href="{{ route('colaboradores.index') }}"
               class="absolute top-4 left-6 bg-gray-600 hover:bg-gray-700 text-white font-semibold px-3 py-1 rounded-md transition text-sm flex items-center">
                ← Voltar
            </a>

            <h1 class="text-2xl font-bold mb-6 text-center text-gray-900 border-b pb-3 mt-4">
                Relatório de Colaboradores
            </h1>

            {{-- MENSAGEM DE SUCESSO --}}
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- FILTROS --}}
            <form action="{{ route('colaboradores.relatorio') }}" method="GET" class="flex flex-wrap gap-4 mb-6">
                {{-- Nome --}}
                <input 
                    type="text" 
                    name="nome" 
                    placeholder="Buscar por nome..." 
                    value="{{ request('nome') }}" 
                    class="border border-gray-300 rounded-lg p-2 w-full sm:w-1/3 text-gray-900"
                >

                {{-- Unidade --}}
                <select 
                    name="unidade_id" 
                    class="border border-gray-300 rounded-lg p-2 w-full sm:w-1/3 text-gray-900 bg-white"
                >
                    <option value="">Todas as Unidades</option>
                    @foreach($unidades as $unidade)
                        <option value="{{ $unidade->id }}" 
                            {{ request('unidade_id') == $unidade->id ? 'selected' : '' }}>
                            {{ $unidade->nome_fantasia }}
                        </option>
                    @endforeach
                </select>

                {{-- Status --}}
                <select 
                    name="status" 
                    class="border border-gray-300 rounded-lg p-2 w-full sm:w-1/4 text-gray-900 bg-white"
                >
                    <option value="">Todos os Status</option>
                    <option value="ativo" {{ request('status') == 'ativo' ? 'selected' : '' }}>Ativo</option>
                    <option value="inativo" {{ request('status') == 'inativo' ? 'selected' : '' }}>Inativo</option>
                </select>

                {{-- Botão de filtro --}}
                <button 
                    type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
                >
                    Filtrar
                </button>
            </form>

            {{-- TABELA DE RESULTADOS --}}
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-400 rounded-lg overflow-hidden">
                    <thead class="bg-gray-700 text-white">
                        <tr>
                            <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold">Nome</th>
                            <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold">Email</th>
                            <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold">CPF</th>
                            <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold">Unidade</th>
                            <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold">Bandeira</th>
                            <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-200 text-gray-900">
                        @forelse($colaboradores as $colaborador)
                            <tr class="border-b border-gray-400 hover:bg-gray-300 transition-colors duration-150">
                                <td class="border border-gray-400 px-3 py-2">{{ $colaborador->nome }}</td>
                                <td class="border border-gray-400 px-3 py-2">{{ $colaborador->email }}</td>
                                <td class="border border-gray-400 px-3 py-2">{{ $colaborador->cpf }}</td>
                                <td class="border border-gray-400 px-3 py-2">{{ $colaborador->unidade->nome_fantasia ?? '-' }}</td>
                                <td class="border border-gray-400 px-3 py-2">{{ $colaborador->unidade->bandeira->nome ?? '-' }}</td>
                                <td class="border border-gray-400 px-3 py-2">
                                    <span class="{{ $colaborador->status == 'ativo' ? 'text-green-600 font-semibold' : 'text-red-600 font-semibold' }}">
                                        {{ ucfirst($colaborador->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-600 py-4">
                                    Nenhum colaborador encontrado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
