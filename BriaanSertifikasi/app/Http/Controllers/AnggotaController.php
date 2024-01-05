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

        return redirect(route('anggota.index'));
    }
}
