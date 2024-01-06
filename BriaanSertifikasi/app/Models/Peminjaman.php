<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_peminjaman';

    protected $fillable = [
        'id_buku',
        'id_anggota',
        'tanggal_peminjaman',
        'tanggal_pengembalian'
    ];

    public function koleksi(){
        return $this->belongsTo(Koleksi::class, 'id_buku', 'id_buku');
    }

    public function anggota(){
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id_anggota');
    }
}
