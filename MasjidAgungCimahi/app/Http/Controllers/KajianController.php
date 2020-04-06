<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Api\Acara;


class KajianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kajian = DB::table('acara')
        ->where('jenis_acara', 'Kajian')
        ->get();

        return view('kajian', ['kajian'=>$kajian]);
        
    }

    
    
}
