<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'level_id',
        'image',
        'nip',
        'nidn',
        'fakultas',
        'prodi',
        'status_dosen',
        'jabatan_fungsional',
        'jabatan',
        'status_serdos',
        'status_keaktifan',
        'no_hp',
        'dokumen'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the level associated with the user.
     */
    public function Level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function Aika()
    {
        return $this->hasMany(Aika::class, 'user_id', 'id');

    }
    public function Pendidikan()
    {
        return $this->hasMany(Pendidikan::class, 'user_id', 'id');

    }
    public function Penelitian()
    {
        return $this->hasMany(Penelitian::class, 'user_id', 'id');

    }
    public function Pengabdian()
    {
        return $this->hasMany(Pengabdian::class, 'user_id', 'id');

    }
    public function Penunjang()
    {
        return $this->hasMany(Penunjang::class, 'user_id', 'id');

    }

}
