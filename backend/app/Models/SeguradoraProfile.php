<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeguradoraProfile extends Model
{
    protected $fillable = [
        'user_id',
        'cpf'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
