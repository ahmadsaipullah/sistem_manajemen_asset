<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aika extends Model
{
    use HasFactory;
    protected $lable = 'aikas';
    protected $fillable = [
        'user_id',
        'nbm',
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


