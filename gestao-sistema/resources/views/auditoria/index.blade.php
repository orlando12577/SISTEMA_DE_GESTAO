@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 relative">

            
            <a href="{{ route('colaboradores.index') }}"
               class="absolute top-4 left-6 bg-gray-600 hover:bg-gray-700 text-white font-semibold px-3 py-1 rounded-md transition text-sm flex items-center">
                ← Voltar
            </a>

            <h1 class="text-2xl font-bold mb-6 text-center text-gray-900 border-b pb-3 mt-4">
                Auditoria do Sistema
            </h1>

            {{-- TABELA DE AUDITORIA --}}
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-400 rounded-lg overflow-hidden">
                    <thead class="bg-gray-700 text-white">
                        <tr>
                            <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold">ID</th>
                            <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold">Usuário</th>
                            <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold">Evento</th>
                            <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold">Modelo</th>
                            <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold">Dados</th>
                            <th class="border border-gray-500 px-3 py-2 text-left text-sm font-semibold">Data</th>
                        </tr>
                    </thead>

                    <tbody class="bg-gray-200 text-gray-900">
                        @forelse($activities as $activity)
                            <tr class="border-b border-gray-400 hover:bg-gray-300 transition-colors duration-150">
                                <td class="border border-gray-400 px-3 py-2">{{ $activity->id }}</td>
                                <td class="border border-gray-400 px-3 py-2">{{ $activity->causer->name ?? 'Sistema' }}</td>
                                <td class="border border-gray-400 px-3 py-2 capitalize">
                                    <span class="px-2 py-1 rounded text-white 
                                        {{ $activity->event == 'created' ? 'bg-green-600' : 
                                           ($activity->event == 'updated' ? 'bg-yellow-500' : 
                                           ($activity->event == 'deleted' ? 'bg-red-600' : 'bg-gray-600')) }}">
                                        {{ $activity->event }}
                                    </span>
                                </td>
                                <td class="border border-gray-400 px-3 py-2">
                                    {{ class_basename($activity->subject_type) ?? '-' }}
                                </td>
                                <td class="border border-gray-400 px-3 py-2 text-sm">
                                    <pre class="bg-gray-100 p-2 rounded text-gray-800 overflow-x-auto text-xs">{{ json_encode($activity->properties, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                                </td>
                                <td class="border border-gray-400 px-3 py-2">
                                    {{ $activity->created_at->format('d/m/Y H:i:s') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-600 py-4">
                                    Nenhuma atividade registrada.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINAÇÃO --}}
            <div class="mt-6">
                {{ $activities->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
