<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Api\Keuangan;


class PemasukanController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pemasukan = DB::table('keuangan')
        ->where('jenis_keuangan', 'Pemasukan')
        ->get();

        $total = Keuangan::select(\DB::raw('SUM(jumlah) as total'))
        ->where('jenis_keuangan', 'Pemasukan')
        ->get();

        return view('keuangan.pemasukan', ['pemasukan'=>$pemasukan], ['total'=>$total]);
        
    }

    public function store(Request $request){
        $request->validate([
            'judul' => 'required',
            'jumlah' => 'required',
            'nama_pemberi' => '',
            'tanggal' => 'required',
            'jenis_keuangan' => 'required',
        ]);

        Keuangan::create([
            'judul' => $request->judul,
            'jumlah' => $request->jumlah,
            'nama_pemberi' => $request->nama_pemberi,
            'tanggal' => $request->tanggal,
            'jenis_keuangan' => $request->jenis_keuangan,
        ]);

        return Response()->json("Pemilik Saham berhasil ditambahkan");

    }

    public function destroy($id)
    {
        DB::table('keuangan')->where('id', $id)->delete();

        return Response()->json('berhasil');

    }
}
