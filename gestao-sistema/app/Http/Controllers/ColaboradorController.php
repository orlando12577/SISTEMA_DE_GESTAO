<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ColaboradoresExport;

class ColaboradorController extends Controller
{
    /**
     * Lista todos os colaboradores com filtro e paginação
     */
    public function index(Request $request)
    {
        $query = Colaborador::with('unidade');

        // Filtra por unidade
        if ($request->filled('unidade_id')) {
            $query->where('unidade_id', $request->unidade_id);
        }

        // Filtra por nome
        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        // Paginação (20 por página)
        $colaboradores = $query->paginate(20)->withQueryString();

        // Todas as unidades para o filtro
        $unidades = Unidade::all();

        return view('colaboradores.index', compact('colaboradores', 'unidades'));
    }

    /**
     * Formulário de criação de colaborador
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('colaboradores.create', compact('unidades'));
    }

    /**
     * Salvar novo colaborador
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cpf' => 'required|string|max:14',
            'unidade_id' => 'required|exists:unidades,id',
        ]);

        Colaborador::create($request->all());

        return redirect()->route('colaboradores.index')
                         ->with('success', 'Colaborador criado com sucesso!');
    }

    /**
     * Formulário de edição
     */
    public function edit(Colaborador $colaborador)
    {
        $unidades = Unidade::all();
        return view('colaboradores.edit', compact('colaborador', 'unidades'));
    }

    /**
     * Atualizar colaborador
     */
    public function update(Request $request, Colaborador $colaborador)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cpf' => 'required|string|max:14',
            'unidade_id' => 'required|exists:unidades,id',
        ]);

        $colaborador->update($request->all());

        return redirect()->route('colaboradores.index')
                         ->with('success', 'Colaborador atualizado com sucesso!');
    }

    /**
     * Excluir colaborador
     */
    public function destroy(Colaborador $colaborador)
    {
        $colaborador->delete();
        return redirect()->route('colaboradores.index')
                         ->with('success', 'Colaborador excluído com sucesso!');
    }

    /**
     * Página de relatório de colaboradores (com filtro)
     */
    public function relatorio(Request $request)
    {
        $query = Colaborador::with('unidade');

        // Filtra por unidade
        if ($request->filled('unidade_id')) {
            $query->where('unidade_id', $request->unidade_id);
        }

        // Filtra por nome
        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        // 🔹 Novo filtro de status (inserido sem alterar nada mais)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $colaboradores = $query->get();
        $unidades = Unidade::all();

        return view('colaboradores.relatorio', compact('colaboradores', 'unidades'));
    }

    /**
     * Exportar colaboradores para Excel
     */
    public function export()
    {
        return Excel::download(new ColaboradoresExport, 'colaboradores.xlsx');
    }
}
