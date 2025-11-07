<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class AuditoriaController extends Controller
{
    /**
     * Exibe os logs de auditoria
     */
    public function index()
    {
        // Pega os logs mais recentes com paginação
        $activities = Activity::latest()->paginate(20);

        // Retorna a view passando a variável $activities
        return view('auditoria.index', compact('activities'));
    }
}

