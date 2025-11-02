<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * Kolom yang boleh diisi massal (mass assignment)
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'no_hp',
        'alamat',
    ];

    /**
     * Kolom yang disembunyikan saat model diubah ke array/JSON
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting atribut otomatis
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
