<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Koleksi;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(){
        $peminjaman = Peminjaman::all();
        return view('peminjaman.index', ['peminjaman' => $peminjaman]);
    }

    public function create(){
        $koleksi = Koleksi::all();
        $anggota = Anggota::all();

        return view('peminjaman.create', compact('koleksi', 'anggota'));
    }

    public function store(Request $request){
        $request->validate([
            'id_buku' =>'required|exists:koleksis,id_buku',
            'id_anggota' => 'required|exists:anggotas,id_anggota',
            'tanggal_peminjaman' => 'required',
            'tanggal_pengembalian' => 'required'
        ]);

        $koleksi = Koleksi::find($request->id_buku);
        $koleksi->decrement('jumlah_tersedia');

        Peminjaman::create($request->all());

        return redirect(route('peminjaman.index'))->with('success', 'Peminjaman Berhasil Dilakukan');
    }
}
