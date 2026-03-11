<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_approved'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_confirmed_at' => 'datetime',
        ];
    }

    //Relacionamento com o perfil da oficina
    public function oficinaProfile(): HasOne
    {
        return $this->hasOne(OficinaProfile::class);
    }

    //Relacionamento com o perfil do regulador
    public function reguladorProfile(): HasOne
    {
        return $this->hasOne(ReguladorProfile::class);
    }

    //Relacionamento com o perfil da seguradora
    public function seguradoraProfile(): HasOne
    {
        return $this->hasOne(SeguradoraProfile::class);

    }

    //Relacionamento com a apólice
    public function apolice(): HasOne
    {
        return $this->hasOne(Apolice::class);
    }
}
