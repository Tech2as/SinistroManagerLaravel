<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OficinaProfile extends Model
{
    protected $fillable = [
        'user_id',
        'cnpj',
        'address',
        'address_number',
        'cep',
        'city',
        'state',
        'phone_number'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //Relacionamento com Sinistro
    public function sinistros()
    {
        return $this->hasMany(Sinistro::class);
    }
}
