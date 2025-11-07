<?php

namespace App\Exports;

use App\Models\GrupoEconomico;
use Maatwebsite\Excel\Concerns\FromCollection;

class GrupoEconomicosExport implements FromCollection
{
    public function collection()
    {
        return GrupoEconomico::all();
    }
}
