<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Unidade extends Model
{
    use LogsActivity;

    // Campos preenchíveis
    protected $fillable = [
        'nome_fantasia',
        'razao_social',
        'cnpj',
        'bandeira_id',
    ];

    // Registrar alterações nos campos preenchíveis
    protected static $logFillable = true;

    /**
     * Configurações do Spatie Activity Log
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()       // loga apenas campos preenchíveis
            ->logOnlyDirty()      // loga apenas alterações
            ->useLogName('unidade'); // nome do log (opcional)
    }

    // Relacionamento com Bandeira
    public function bandeira()
    {
        return $this->belongsTo(Bandeira::class);
    }

    // Relacionamento com Colaboradores
    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class);
    }
}
