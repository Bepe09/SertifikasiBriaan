<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_buku';

    protected $fillable = [
        'judul',
        'gambar',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'jumlah_tersedia'
    ];
}
