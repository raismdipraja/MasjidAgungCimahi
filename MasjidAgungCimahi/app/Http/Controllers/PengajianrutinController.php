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


        return view('pengajianrutin', ['senin'=>$senin], ['selasa'=>$selasa, 'rabu'=>$rabu, 'kamis'=>$kamis, 'jumat'=>$jumat, 'sabtu'=>$sabtu, 'minggu'=>$minggu]);
    }
}
