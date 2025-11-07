<?php

namespace App\Http\Controllers;

use App\Models\Bandeira;
use App\Models\GrupoEconomico;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BandeirasExport;

class BandeiraController extends Controller
{
    public function index()
    {
        $bandeiras = Bandeira::with('grupoEconomico')->get();
        return view('bandeiras.index', compact('bandeiras'));
    }

    public function create()
    {
        $grupos = GrupoEconomico::all();
        return view('bandeiras.create', compact('grupos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'grupo_economico_id' => 'required|exists:grupo_economicos,id',
        ]);

        Bandeira::create($request->only('nome', 'grupo_economico_id'));

        return redirect()->route('bandeiras.index')->with('success', 'Bandeira criada com sucesso!');
    }

    public function edit(Bandeira $bandeira)
    {
        $grupos = GrupoEconomico::all();
        return view('bandeiras.edit', compact('bandeira', 'grupos'));
    }

    public function update(Request $request, Bandeira $bandeira)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'grupo_economico_id' => 'required|exists:grupo_economicos,id',
        ]);

        $bandeira->update($request->only('nome', 'grupo_economico_id'));

        return redirect()->route('bandeiras.index')->with('success', 'Bandeira atualizada com sucesso!');
    }

    public function destroy(Bandeira $bandeira)
    {
        $bandeira->delete();
        return redirect()->route('bandeiras.index')->with('success', 'Bandeira excluída com sucesso!');
    }

    public function export()
    {
        return Excel::download(new BandeirasExport, 'bandeiras.xlsx');
    }
}
