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
        $this->title = "Pengeluaran";
        $this->menu = "Pengeluaran";
        $this->subMenu2 = "Pengeluaran";
    }

    public function prefix($param = null)
    {
        $data['title'] = $this->title;
        $data['menu'] = $this->menu;
        $data['subMenu2'] = $this->subMenu2;

        

        if(isset($param)){
            foreach ($param as $index => $value) {
                $data[$index] = $value;
            }
        }

        return $data;
    }

    public function index()
    {
        $pengeluaran = DB::table('keuangan')
        ->where('jenis_keuangan', 'Pengeluaran')
        ->get();

        $total = Keuangan::select(\DB::raw('SUM(pengeluaran) as total'))
        ->where('jenis_keuangan', 'Pengeluaran')
        ->get();

        $data['title'] = $this->title;
        $data['menu'] = $this->menu;
        $data['subMenu2'] = $this->subMenu2;

        return view('keuangan.pengeluaran', $this->prefix($data), ['pengeluaran'=>$pengeluaran, 'total'=>$total]);
        
    }

    public function store(Request $request){
        $request->validate([
            'judul' => 'required',
            'pengeluaran' => 'required',
            'tanggal' => 'required',

        ]);

        Keuangan::create([
            'judul' => $request->judul,
            'jumlah' => '0',
            'pengeluaran' => $request->pengeluaran,
            'nama_pemberi' => 'null',
            'tanggal' => $request->tanggal,
            'jenis_keuangan' => 'Pengeluaran',
        ]);

        
        return Response()->json('berhasil');

    }

    public function destroy(Request $request, $id)
    {
        
        DB::table('keuangan')->where('id', $id)->delete();

        return Response()->json('berhasil');

    }

    public function edit($id){
        $kajian =   Keuangan::find($id);
        
        return $kajian;
       }

       public function update(Request $request, $id){
        $request->validate([
            'judul' => 'required',
            'pengeluaran' => 'required|numeric',
            'tanggal' => 'required',

        ]);

        $keuangan = Keuangan::find($id);
        $keuangan->judul   = $request->judul;
        $keuangan->jumlah   = '0';
        $keuangan->pengeluaran   = $request->pengeluaran;
        $keuangan->nama_pemberi = 'null';
        $keuangan->tanggal =$request->tanggal;
        $keuangan->jenis_keuangan  = 'Pengeluaran';
        $keuangan->save();        
       

        return Response()->json('berhasil');
       }


}