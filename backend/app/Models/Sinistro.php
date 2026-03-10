<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sinistro extends Model
{
     protected $fillable = [
        'oficina_id',
        'regulador_id',
        'chassi',
        'valor_reparo',
        'salvado',
        'status',
        'data_sinistro'
    ];

    public function oficina()
    {
        return $this->belongsTo(OficinaProfile::class, 'oficina_id');
    }

    public function regulador()
    {
        return $this->belongsTo(ReguladorProfile::class, 'regulador_id');
    }
}
