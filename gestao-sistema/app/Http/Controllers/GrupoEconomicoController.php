<?php

namespace App\Http\Controllers;

use App\Models\GrupoEconomico;
use Illuminate\Http\Request;

class GrupoEconomicoController extends Controller
{
    /**
     * Exibir a lista de grupos econômicos
     */
    public function index()
    {
        $grupos = GrupoEconomico::all(); // pega todos os grupos
        return view('grupos.index', compact('grupos'));
    }

    /**
     * Mostrar o formulário de criação
     */
    public function create()
    {
        return view('grupos.create');
    }

    /**
     * Salvar um novo grupo econômico
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        GrupoEconomico::create($request->only('nome'));

        return redirect()->route('grupos.index')->with('success', 'Grupo criado com sucesso!');
    }

    /**
     * Mostrar detalhes de um grupo (opcional)
     */
    public function show(GrupoEconomico $grupo)
    {
        return view('grupos.show', compact('grupo'));
    }

    /**
     * Mostrar formulário de edição
     */
    public function edit(GrupoEconomico $grupo)
    {
        return view('grupos.edit', compact('grupo'));
    }

    /**
     * Atualizar grupo econômico
     */
    public function update(Request $request, GrupoEconomico $grupo)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $grupo->update($request->only('nome'));

        return redirect()->route('grupos.index')->with('success', 'Grupo atualizado com sucesso!');
    }

    /**
     * Excluir grupo econômico
     */
    public function destroy(GrupoEconomico $grupo)
    {
        $grupo->delete();

        return redirect()->route('grupos.index')->with('success', 'Grupo excluído com sucesso!');
    }
}
