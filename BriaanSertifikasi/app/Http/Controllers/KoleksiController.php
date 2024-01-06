<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    public function index(){
        //Mengambil semua data dari tabel Koleksi
        $koleksi = Koleksi::all();

        //Mengembalikan tampilan 'koleksi.index' dengan daftar list isi dari tabel Koleksi
        return view('koleksi.index', ['koleksi' => $koleksi]);
    }

    public function katalogindex(){
        //Mengambil semua data dari tabel Koleksi
        $koleksi = Koleksi::all();

        //Mengembalikan tampilan 'katalog.index' dengan daftar list isi dari tabel Koleksi untuk katalog
        return view('katalog.index', ['koleksi' => $koleksi]);
    }

    public function create(){
        //Mengembalikan tampilan 'koleksi.create' untuk membuat data Koleksi baru
        return view('koleksi.create');
    }

    public function store(Request $request){
        //Menyimpan file gambar dengan menggunakan request
        $file = $request->gambar;
        $filename = $file ? $file->getClientOriginalName() : null;

        //Membuat data Koleksi baru dengan data yang sudah divalidasi
        Koleksi::create([
            'judul' => $request->judul,
            'gambar' => $filename,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_tersedia' => $request->jumlah_tersedia
        ]);

        //Memindahkan file yang telah diunggah ke dalam direktori 'assets/'
        if ($file) {
            $request->gambar->move('assets/', $filename);
        }

        //Mengembalikan tampilan 'koleksi.index' dengan data yang baru disertai pesan bila pembuatan data berhasil
        return redirect(route('koleksi.index'))->with('success', 'Buku Baru Berhasil di Tambahkan');
    }

    public function edit($id){
        //Mencari data dari Tabel Koleksi dengan id yang sesuai
        $koleksi = Koleksi::find($id);

        //Mengembalikan tampilan 'koleksi.edit' dengan data dari Tabel Koleksi yang sesuai
        return view('koleksi.edit', compact('koleksi'));
    }

    public function update($id, Request $request){
        //Menyimpan file gambar dengan menggunakan request
        $file = $request->gambar;
        $filename = $file ? $file->getClientOriginalName() : null;

        //Mencari data dari Tabel Koleksi dengan id yang sesuai
        $data = Koleksi::find($id);

        //mengUpdate data dari tabel Koleksi
        $data->update([
            'judul' => $request->judul,
            'gambar' => $filename,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_tersedia' => $request->jumlah_tersedia
        ]);

        //Memindahkan file yang telah diunggah ke dalam direktori 'assets/'
        if ($file) {
            $request->gambar->move('assets/', $filename);
        }

        //Mengembalikan tampilan 'koleksi.index' dengan data yang baru disertai pesan bila data berhasil diperbarui
        return redirect(route('koleksi.index'))->with('success', 'Data Buku Berhasil Diperbarui');
    }

    public function destroy($id){
        //Mencari data dari tabel Koleksi berdasarkan id yang dipilih
        $koleksi = Koleksi::find($id);

        //Menghapus data dari tabel Koleksi yang sudah ditemukan berdasarkan id yang di pilih
        $koleksi->delete();

        //Mengembalikan tampilan 'koleksi.index' dengan data yang baru beserta pesan bila data yang dipilih berhasil dihapus
        return redirect(route('koleksi.index'))->with('success', 'Data Buku Berhasil di Hapus');
    }
}
