<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PelatihanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pelatihan = DB::table('acara')
        ->where('jenis_acara', 'pelatihan')
        ->get();

        return view('pelatihan', ['pelatihan'=>$pelatihan]);
        
    }
}
