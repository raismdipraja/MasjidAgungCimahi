<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Api\Keuangan;


class PengeluaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pengeluaran = DB::table('keuangan')
        ->where('jenis_keuangan', 'Pengeluaran')
        ->get();

        $total = Keuangan::select(\DB::raw('SUM(jumlah) as total'))
        ->where('jenis_keuangan', 'Pengeluaran')
        ->get();

        return view('keuangan.pengeluaran', ['pengeluaran'=>$pengeluaran], ['total'=>$total]);
        
    }
}