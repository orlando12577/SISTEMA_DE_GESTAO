<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use App\Models\Bandeira;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UnidadesExport;

class UnidadeController extends Controller
{
    public function index()
    {
        $unidades = Unidade::with('bandeira')->get();
        return view('unidades.index', compact('unidades'));
    }

    public function create()
    {
        $bandeiras = Bandeira::all();
        return view('unidades.create', compact('bandeiras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_fantasia' => 'required|string|max:255',
            'razao_social' => 'required|string|max:255',
            'cnpj' => 'required|string|max:18',
            'bandeira_id' => 'required|exists:bandeiras,id',
        ]);

        Unidade::create($request->all());

        return redirect()->route('unidades.index')->with('success', 'Unidade criada com sucesso!');
    }

    public function edit(Unidade $unidade)
    {
        $bandeiras = Bandeira::all();
        return view('unidades.edit', compact('unidade', 'bandeiras'));
    }

    public function update(Request $request, Unidade $unidade)
    {
        $request->validate([
            'nome_fantasia' => 'required|string|max:255',
            'razao_social' => 'required|string|max:255',
            'cnpj' => 'required|string|max:18',
            'bandeira_id' => 'required|exists:bandeiras,id',
        ]);

        $unidade->update($request->all());

        return redirect()->route('unidades.index')->with('success', 'Unidade atualizada com sucesso!');
    }

    public function destroy(Unidade $unidade)
    {
        $unidade->delete();
        return redirect()->route('unidades.index')->with('success', 'Unidade excluída com sucesso!');
    }

    public function export()
    {
        return Excel::download(new UnidadesExport, 'unidades.xlsx');
    }
}
