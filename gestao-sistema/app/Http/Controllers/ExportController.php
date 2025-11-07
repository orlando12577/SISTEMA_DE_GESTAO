<?php

namespace App\Http\Controllers;

use App\Exports\GrupoEconomicosExport;
use App\Exports\BandeirasExport;
use App\Exports\UnidadesExport;
use App\Exports\ColaboradoresExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportGrupos()
    {
        return Excel::download(new GrupoEconomicosExport, 'grupos_economicos.xlsx');
    }

    public function exportBandeiras()
    {
        return Excel::download(new BandeirasExport, 'bandeiras.xlsx');
    }

    public function exportUnidades()
    {
        return Excel::download(new UnidadesExport, 'unidades.xlsx');
    }

    public function exportColaboradores()
    {
        return Excel::download(new ColaboradoresExport, 'colaboradores.xlsx');
    }
}

