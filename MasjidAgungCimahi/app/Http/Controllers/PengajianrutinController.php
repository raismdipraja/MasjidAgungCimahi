<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Api\PengajianRutin;


class PengajianrutinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->viewPrefix = 'Pengajianrutin';
        $this->title = "Pengajian Rutin";
        $this->menu = "Pengajian Rutin";
    }

    public function prefix($param = null)
    {
        $data['title'] = $this->title;
        $data['menu'] = $this->menu;

        if(isset($param)){
            foreach ($param as $index => $value) {
                $data[$index] = $value;
            }
        }

        return $data;
    }


    public function index(){

        $senin = DB::table('pengajian_rutin')
        ->where('hari', 'Senin')
        ->get();

        $selasa = DB::table('pengajian_rutin')
        ->where('hari', 'Selasa')
        ->get();

        $rabu = DB::table('pengajian_rutin')
        ->where('hari', 'Rabu')
        ->get();

        $kamis = DB::table('pengajian_rutin')
        ->where('hari', 'Kamis')
        ->get();

        $jumat = DB::table('pengajian_rutin')
        ->where('hari', 'Jumat')
        ->get();

        $sabtu = DB::table('pengajian_rutin')
        ->where('hari', 'Sabtu')
        ->get();

        $minggu = DB::table('pengajian_rutin')
        ->where('hari', 'Minggu')
        ->get();


        $data['title'] = $this->title;
        $data['menu'] = $this->menu;


        return view($this->viewPrefix, $this->prefix($data), ['senin'=>$senin, 'selasa'=>$selasa, 'rabu'=>$rabu, 'kamis'=>$kamis, 'jumat'=>$jumat, 'sabtu'=>$sabtu, 'minggu'=>$minggu]);
    }

    public function store(Request $request){
        $request->validate([
            'judul' => 'required',
            'nama_ustad' => 'required',
            'hari' => 'required',
            'jam' => 'required',

        ]);


        PengajianRutin::create([
            'judul' => $request->judul,
            'nama_ustad' => $request->nama_ustad,
            'hari' => $request->hari,
            'jam' => $request->jam,
        ]);

        return Response()->json('berhasil');

    }
}
