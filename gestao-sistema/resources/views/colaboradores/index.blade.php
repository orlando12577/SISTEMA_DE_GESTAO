@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 relative">

            
            <a href="{{ route('dashboard') }}"
               class="absolute top-4 left-6 bg-gray-600 hover:bg-gray-700 text-white font-semibold px-3 py-1 rounded-md transition text-sm flex items-center">
                ← Voltar
            </a>

            <h1 class="text-2xl font-bold mb-6 text-center text-gray-900 mt-4">Colaboradores</h1>

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
            @endif

            <!-- Botões principais centralizados -->
            <div class="mb-4 flex flex-wrap gap-2 justify-center">
                <a href="{{ route('colaboradores.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Novo Colaborador</a>
                <a href="{{ route('export.colaboradores') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Exportar Excel</a>
                <a href="{{ route('colaboradores.relatorio') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Relatório</a>
            </div>

            <!-- Filtro rápido -->
            <form action="{{ route('colaboradores.index') }}" method="GET"
                class="mb-6 flex flex-wrap gap-2 items-center justify-center bg-gray-100 p-3 rounded-lg shadow-sm text-black">
                <select name="unidade_id" class="border border-gray-400 p-2 rounded text-black">
                    <option value="">Todas as Unidades</option>
                    @foreach(\App\Models\Unidade::all() as $unidade)
                        <option value="{{ $unidade->id }}" {{ request('unidade_id') == $unidade->id ? 'selected' : '' }}>
                            {{ $unidade->nome_fantasia }}
                        </option>
                    @endforeach
                </select>

                <input type="text" name="nome" placeholder="Buscar por nome" value="{{ request('nome') }}"
                    class="border border-gray-400 p-2 rounded flex-1 min-w-[200px] text-black">

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Filtrar</button>
            </form>

            <!-- Tabela de colaboradores -->
            <table class="w-full border-collapse border border-gray-400 rounded-lg overflow-hidden">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold text-white">ID</th>
                        <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold text-white">Nome</th>
                        <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold text-white">Email</th>
                        <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold text-white">CPF</th>
                        <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold text-white">Unidade</th>
                        <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold text-white">Ações</th>
                    </tr>
                </thead>

                <tbody class="bg-gray-200 text-gray-900">
                    @foreach($colaboradores as $colaborador)
                    <tr class="border-b border-gray-400 hover:bg-gray-300 transition-colors duration-150">
                        <td class="border border-gray-400 px-3 py-2">{{ $colaborador->id }}</td>
                        <td class="border border-gray-400 px-3 py-2">{{ $colaborador->nome }}</td>
                        <td class="border border-gray-400 px-3 py-2">{{ $colaborador->email }}</td>
                        <td class="border border-gray-400 px-3 py-2">{{ $colaborador->cpf }}</td>
                        <td class="border border-gray-400 px-3 py-2">{{ $colaborador->unidade->nome_fantasia ?? '-' }}</td>
                        <td class="border border-gray-400 px-3 py-2 flex gap-2">
                            <a href="{{ route('colaboradores.edit', $colaborador) }}" class="bg-yellow-400 hover:bg-yellow-500 px-2 py-1 rounded text-white">Editar</a>
                            <form action="{{ route('colaboradores.destroy', $colaborador) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir este colaborador?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 px-2 py-1 rounded text-white">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
