<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penunjang extends Model
{
    use HasFactory;
    protected $lable = 'penunjangs';
    protected $fillable = [
        'user_id',
        'nama_kegiatan',
        'lokasi_kegiatan',
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
