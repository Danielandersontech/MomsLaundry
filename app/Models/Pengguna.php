<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Import Authenticatable
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengguna extends Authenticatable
{
    use SearchableTrait;
    use HasFactory;

    protected $searchable = [
        'columns' => [
            'penggunas.nama' => 1,
            'penggunas.id_pengguna' => 10,
        ],
    ];

    protected $guarded = []; // Bisa menggunakan 'fillable' atau 'guarded' sesuai preferensi

    protected $primaryKey = 'id_pengguna'; // Primary key

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama',
        'email',
        'password',
        'no_hp',
        'alamat',
        'role',
    ];

    // Relasi dengan model lain
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'id_pengguna', 'id_pengguna');
    }

    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class, 'id_pengguna', 'id_pengguna');
    }

    // Kolom yang harus disembunyikan (tidak akan tampil di output)
    protected $hidden = [
        'password', 'remember_token',
    ];
}
