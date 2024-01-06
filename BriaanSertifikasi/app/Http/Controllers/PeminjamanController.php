<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Koleksi;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
        return view('peminjaman.index', ['peminjaman' => $peminjaman]);
    }

    public function create()
    {
        $koleksi = Koleksi::all();
        $anggota = Anggota::all();

        return view('peminjaman.create', compact('koleksi', 'anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_buku' => 'required|exists:koleksis,id_buku',
            'id_anggota' => 'required|exists:anggotas,id_anggota',
            'tanggal_peminjaman' => 'required',
            'tanggal_pengembalian' => 'required',
            'status_pengembalian' => 'required'
        ]);

        $koleksi = Koleksi::find($request->id_buku);
        $koleksi->decrement('jumlah_tersedia');

        Peminjaman::create($request->all());

        return redirect(route('peminjaman.index'))->with('success', 'Peminjaman Berhasil Dilakukan');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::find($id);
        $koleksi = Koleksi::all();
        $anggota = Anggota::all();

        return view('peminjaman.edit', compact('peminjaman', 'koleksi', 'anggota'));
    }

    public function update($id, Request $request)
    {

        $data = Peminjaman::find($id);

        $data->update([
            'id_buku' => $request->id_buku,
            'id_anggota' => $request->id_anggota,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'status_pengembalian' => $request->status_pengembalian
        ]);

        if ($request->status_pengembalian == 'Sudah Kembali') {
            $koleksi = Koleksi::find($request->id_buku);
            $koleksi->increment('jumlah_tersedia');
        }

        return redirect(route('peminjaman.index'))->with('success', 'Data Peminjaman Berhasil Diperbarui');
    }
}
