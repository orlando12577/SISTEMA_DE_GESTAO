<?php

namespace App\Exports;

use App\Models\Unidade;
use Maatwebsite\Excel\Concerns\FromCollection;

class UnidadesExport implements FromCollection
{
    public function collection()
    {
        return Unidade::all();
    }
}
