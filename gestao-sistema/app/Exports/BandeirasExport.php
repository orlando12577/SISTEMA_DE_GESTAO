<?php

namespace App\Exports;

use App\Models\Bandeira;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BandeirasExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Bandeira::with('grupoEconomico')
            ->get()
            ->map(function ($bandeira) {
                return [
                    'ID' => $bandeira->id,
                    'Nome da Bandeira' => $bandeira->nome,
                    'Grupo Econômico' => $bandeira->grupoEconomico->nome ?? '—',
                    'Criada em' => $bandeira->created_at->format('d/m/Y H:i'),
                    'Atualizada em' => $bandeira->updated_at->format('d/m/Y H:i'),
                ];
            });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nome da Bandeira',
            'Grupo Econômico',
            'Criada em',
            'Atualizada em'
        ];
    }
}
