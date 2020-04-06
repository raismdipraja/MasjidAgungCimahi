<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class KegiatanislamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kegiatanislam = DB::table('acara')
        ->where('jenis_acara', 'Kegiatan Islam')
        ->get();

        return view('kegiatanislam', ['kegiatanislam'=>$kegiatanislam]);
        
    }
}
