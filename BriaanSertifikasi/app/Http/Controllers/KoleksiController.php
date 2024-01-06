<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    public function index(){
        $koleksi = Koleksi::all();
        return view('koleksi.index', ['koleksi' => $koleksi]);
    }

    public function katalogindex(){
        $koleksi = Koleksi::all();
        return view('katalog.index', ['koleksi' => $koleksi]);
    }

    public function create(){
        return view('koleksi.create');
    }

    public function store(Request $request){
        $file = $request->file;
        $filename = $file ? $file->getClientOriginalName() : null;

        $data = $request->validate([
            'judul' => 'required',
            'gambar' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'jumlah_tersedia' => 'required|numeric'
        ]);

        if ($file) {
            $request->file->move('assets/', $filename);
        }

        $koleksiBaru = Koleksi::create($data);

        return redirect(route('koleksi.index'))->with('success', 'Buku Baru Berhasil di Tambahkan');
    }

    public function edit($id){
        $koleksi = Koleksi::find($id);
        //dd($anggota);
        return view('koleksi.edit', compact('koleksi'));
    }

    public function update($id, Request $request){

        $file = $request->file;
        $filename = $file ? $file->getClientOriginalName() : null;

        $data = Koleksi::find($id);

        $data->update([
            'judul' => $request->judul,
            'gambar' => $request->gambar,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_tersedia' => $request->jumlah_tersedia
        ]);

        if ($file) {
            $request->file->move('assets/', $filename);
        }

        return redirect(route('koleksi.index'))->with('success', 'Data Buku Berhasil Diperbarui');
    }

    public function destroy($id){
        $koleksi = Koleksi::find($id);
        $koleksi->delete();

        return redirect(route('koleksi.index'))->with('success', 'Data Buku Berhasil di Hapus');
    }
}
