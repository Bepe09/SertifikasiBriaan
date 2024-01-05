<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index(){
        $anggota = Anggota::all();
        return view('anggota.index', ['anggota' => $anggota]);
    }

    public function create(){
        return view('anggota.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required|numeric'
        ]);

        $anggotaBaru = Anggota::create($data);

        return redirect(route('anggota.index'))->with('success', 'Data Anggota Berhasil di Tambahkan');
    }

    public function edit($id){
        $anggota = Anggota::find($id);
        //dd($anggota);
        return view('anggota.edit', compact('anggota'));
    }

    public function update($id, Request $request){
        $data = Anggota::find($id);

        $data->update([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon
        ]);

        return redirect(route('anggota.index'))->with('success', 'Data Anggota Berhasil Diperbarui');
    }

    public function destroy($id){
        $anggota = Anggota::find($id);
        $anggota->delete();

        return redirect(route('anggota.index'))->with('success', 'Data Anggota Berhasil di Hapus');
    }
}
