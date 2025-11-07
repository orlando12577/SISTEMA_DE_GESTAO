<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Colaborador extends Model
{
    use LogsActivity;

    // ✅ Define o nome correto da tabela no banco
    protected $table = 'colaboradores';

    protected static $logFillable = true;

    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'unidade_id',
    ];

    /**
     * Configurações do Spatie Activity Log
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()       // loga apenas campos preenchíveis
            ->logOnlyDirty()      // loga apenas alterações
            ->useLogName('colaborador'); // nome do log (opcional)
    }

    // Relacionamento com Unidade
    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }
}
