@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 relative">

            <a href="{{ route('dashboard') }}"
               class="absolute top-4 left-6 bg-gray-600 hover:bg-gray-700 text-white font-semibold px-3 py-1 rounded-md transition text-sm flex items-center">
                ← Voltar
            </a>

            <h1 class="text-2xl font-bold mb-4 text-gray-900 text-center mt-4">Grupos Econômicos</h1>
            
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
            @endif

            <div class="mb-4 flex gap-2">
                <a href="{{ route('grupos.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Novo Grupo</a>
                <a href="{{ route('export.grupos') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Exportar Excel</a>
            </div>

            <table class="w-full border-collapse border border-gray-400 rounded-lg overflow-hidden">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold text-white">ID</th>
                        <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold text-white">Nome</th>
                        <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold text-white">Ações</th>
                    </tr>
                </thead>

                <tbody class="bg-gray-200 text-gray-900">
                    @foreach($grupos as $grupo)
                    <tr class="border-b border-gray-400 hover:bg-gray-300 transition-colors duration-150">
                        <td class="border border-gray-400 px-3 py-2">{{ $grupo->id }}</td>
                        <td class="border border-gray-400 px-3 py-2">{{ $grupo->nome }}</td>
                        <td class="border border-gray-400 px-3 py-2 flex gap-2">
                            <a href="{{ route('grupos.edit', $grupo) }}" class="bg-yellow-400 hover:bg-yellow-500 px-2 py-1 rounded text-white">Editar</a>

                            <form action="{{ route('grupos.destroy', $grupo) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir este grupo?');">
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
