<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class formController extends Controller
{
    public function index(){
        return view('form');
    }

    public function submitForm(Request $request){
        $validasi = $request->validate([
            'nama' => ['required'],
            'foto_peminjam' => ['required','image','mimes:jpg,jpeg,png,svg,webp,avif','max:2048'],
            'no_telpon' => ['required'],
            'jabatan' => ['required'],
            'barang' => ['required','string'],
            'jmlh_unit' => ['required'],
            'aksesoris' => ['nullable'],
            'keperluan' => ['required'],
            'keterangan' => ['nullable'],
            'pengembalian' => ['required'],
        ]);

        $foto_peminjam = $request->file('foto_peminjam');
        $foto_peminjam_name = time().'_'.$foto_peminjam->getClientOriginalName();
        $path = public_path('foto_peminjam/');
        $foto_peminjam->move($path, $foto_peminjam_name);

        $validasi['foto_peminjam'] = $foto_peminjam_name;

        Peminjaman::create($validasi);

        return redirect('/')->with('succ','Succes mengirim form.');
    }
}
