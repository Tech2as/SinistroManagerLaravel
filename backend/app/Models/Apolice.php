<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apolice extends Model
{

    protected $fillable = [
        'user_id',
        'numero_apolice',
        'valor_cobertura'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
