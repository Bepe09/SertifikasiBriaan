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
        //Mengambil semua data dari tabel Peminjaman
        $peminjaman = Peminjaman::all();

        //Mengembalikan tampilan 'peminjaman.index' dengan daftar list isi dari tabel Peminjaman
        return view('peminjaman.index', ['peminjaman' => $peminjaman]);
    }

    public function create()
    {
        //Mengambil semua data dari tabel Koleksi
        $koleksi = Koleksi::all();
        //Mengambil semua data dari tabel Anggota
        $anggota = Anggota::all();

        //Mengembalikan tampilan 'peminjaman.index' dengan record dari tabel Koleksi, dan Anggota
        return view('peminjaman.create', compact('koleksi', 'anggota'));
    }

    public function store(Request $request)
    {
        //Memvalidasi Data Input
        $request->validate([
            'id_buku' => 'required|exists:koleksis,id_buku',
            'id_anggota' => 'required|exists:anggotas,id_anggota',
            'tanggal_peminjaman' => 'required',
            'tanggal_pengembalian' => 'required',
            'status_pengembalian' => 'required'
        ]);

        //Mencari data dari Tabel Koleksi dengan id_buku yang sesuai
        $koleksi = Koleksi::find($request->id_buku);
        //Mengurangi jumlah_tersedia dari Tabel Koleksi
        $koleksi->decrement('jumlah_tersedia');

        //Membuat Data baru untuk tabel Peminjaman berdasarkan data yang sudah divalidasi
        Peminjaman::create($request->all());

        //Mengembalikan tampilan 'peminjaman.index' dengan data yang baru disertai pesan bila pembuatan data berhasil
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
        //Mencari data dari Tabel Peminjaman dengan id yang sesuai
        $data = Peminjaman::find($id);

        //mengUpdate data dari tabel Koleksi
        $data->update([
            'id_buku' => $request->id_buku,
            'id_anggota' => $request->id_anggota,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'status_pengembalian' => $request->status_pengembalian
        ]);

        //Melakukan penambahan pada jumlah_tersedia pada tabel Koleksi bila status_pengembalian pada tabel Peminjaman menjadi 'Sudah Kemabli'
        if ($request->status_pengembalian == 'Sudah Kembali') {
            $koleksi = Koleksi::find($request->id_buku);
            $koleksi->increment('jumlah_tersedia');
        }

        //Mengembalikan tampilan 'peminjaman.index' dengan data yang baru beserta pesan bila data berhasil diperbarui
        return redirect(route('peminjaman.index'))->with('success', 'Data Peminjaman Berhasil Diperbarui');
    }
}
