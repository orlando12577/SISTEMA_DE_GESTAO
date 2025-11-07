<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class GrupoEconomico extends Model
{
    use LogsActivity;

    // Campos que podem ser preenchidos via mass-assignment
    protected $fillable = [
        'nome',
    ];

    // Registrar alterações nos campos preenchíveis
    protected static $logFillable = true;

    /**
     * Configurações do Spatie Activity Log
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()        // loga apenas campos preenchíveis
            ->logOnlyDirty()       // loga apenas campos alterados
            ->useLogName('grupo'); // nome do log (opcional)
    }

    // Relacionamento com Bandeiras
    public function bandeiras()
    {
        return $this->hasMany(Bandeira::class);
    }
}
