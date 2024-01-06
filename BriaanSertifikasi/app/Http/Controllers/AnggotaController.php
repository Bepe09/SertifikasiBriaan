<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index(){
        //Mengambil semua data dari tabel Anggota
        $anggota = Anggota::all();

        //Mengembalikan tampilan 'anggota.index' dengan daftar list isi dari tabel Anggota
        return view('anggota.index', ['anggota' => $anggota]);
    }

    public function create(){
        //Mengembalikan tampilan 'anggota.create' untuk membuat data Anggota baru
        return view('anggota.create');
    }

    public function store(Request $request){
        //Memvalidasi Data Input
        $data = $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required|numeric'
        ]);

        //Membuat Data baru untuk tabel Anggota berdasarkan data yang sudah divalidasi
        $anggotaBaru = Anggota::create($data);

        //Mengembalikan tampilan 'anggota.index' dengan data yang baru disertai pesan bila pembuatan data berhasil
        return redirect(route('anggota.index'))->with('success', 'Data Anggota Berhasil di Tambahkan');
    }

    public function edit($id){
        //Mencari data dari Tabel Anggota dengan id yang sesuai
        $anggota = Anggota::find($id);

        //Mengembalikan tampilan 'anggota.edit' dengan data dari Tabel Anggota yang sesuai
        return view('anggota.edit', compact('anggota'));
    }

    public function update($id, Request $request){
        //Mencari data dari tabel Anggota dengan Id yang dipilih
        $data = Anggota::find($id);

        //mengUpdate data dari tabel Anggota
        $data->update([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon
        ]);

        //Mengembalikan tampilan 'anggota.index' dengan data yang sudah diperbarui beserta pesan bila data berhasil diperbarui
        return redirect(route('anggota.index'))->with('success', 'Data Anggota Berhasil Diperbarui');
    }

    public function destroy($id){
        //Mencari data dari tabel Anggota berdasarkan id yang dipilih
        $anggota = Anggota::find($id);

        //Menghapus data dari tabel anggota yang sudah ditemukan berdasarkan id yang di pilih
        $anggota->delete();

        //Mengembalikan tampilan 'anggota.index' dengan data yang baru beserta pesan bila data yang dipilih berhasil dihapus
        return redirect(route('anggota.index'))->with('success', 'Data Anggota Berhasil di Hapus');
    }
}
