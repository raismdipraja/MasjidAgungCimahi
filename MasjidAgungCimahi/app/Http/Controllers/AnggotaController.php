<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;


class AnggotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $anggota = DB::table('users')
        ->where('role', 'dkm')
        ->get();


        return view('anggota', ['anggota'=>$anggota]);
        
    }
}
