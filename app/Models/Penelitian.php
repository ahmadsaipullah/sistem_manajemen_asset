<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    use HasFactory;
    protected $lable = 'penelitians';
    protected $fillable = [
        'user_id',
        'nama_publikasi',
        'sk_kegiatan',
        'tanggal_sk_kegiatan',
        'jumlah_sks',
        'dokumen',
        'status',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
