<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard',[
            'dataPinjam' => Peminjaman::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    public function searchData(Request $request){
        $data = Peminjaman::where('nama', 'LIKE', '%' . $request->search . '%')->get();

        return view('dashboard',[
            'dataPinjam' => $data
        ]);
    }
}
