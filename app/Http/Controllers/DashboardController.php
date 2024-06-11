<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard',[
            'dataPinjam' => Peminjaman::orderBy('created_at', 'desc')->paginate(5),
        ]);
    }

    public function BarangIndex(){
        return view('BarangPage.index',[
            'dataBarang' => DataBarang::orderBy('created_at','asc')->paginate(8),
        ]);
    }

    public function TambahBarangIndex(){
        return view('BarangPage.tambah');
    }
    public function EditBarangIndex(Request $request){
        return view('BarangPage.edit',[
            'data' => DataBarang::findOrFail($request->id_barang),
        ]);
    }

    public function TambahBarang(Request $request){
        $validasi = $request->validate([
            'nama_barang' => ['required'],
            'kode_barang' => ['required'],
        ]);

        DataBarang::create($validasi);

        return redirect('/admin/barang')->with('succ','Berhasil tambah barang.');
    }

    public function EditBarang(Request $request){
        $validasi = $request->validate([
            'id_barang' => ['required'],
            'nama_barang' => ['required'],
            'kode_barang' => ['required'],
        ]);

        $barang = DataBarang::findOrFail($request->id_barang);
        $barang->nama_barang = $request->nama_barang;
        $barang->kode_barang = $request->kode_barang;
        $barang->save();

        return redirect('/admin/barang')->with('succ','Berhasil edit barang.');
    }

    public function HapusPeminjam(Request $request){
        $id = $request->id_barang;

        $peminjam = Peminjaman::findOrFail($id);

        $peminjam->delete();

        return redirect()->back()->with('succ', 'Berhasil hapus data.');
    }

    public function HapusBarang(Request $request){
        $id = $request->id_barang;

        $barang = DataBarang::findOrFail($id);

        $barang->delete();

        return redirect()->back()->with('succ', 'Berhasil hapus data.');
    }

    public function searchData(Request $request){
        $data = Peminjaman::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(10);

        return view('dashboard',[
            'dataPinjam' => $data
        ]);
    }
}
