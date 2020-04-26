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
        $this->title = "Pemasukan";
        $this->menu = "Keuangan";
        $this->subMenu = "Pemasukan";

    }

    public function prefix($param = null)
    {
        $data['title'] = $this->title;
        $data['menu'] = $this->menu;
        $data['subMenu'] = $this->subMenu;

        

        if(isset($param)){
            foreach ($param as $index => $value) {
                $data[$index] = $value;
            }
        }

        return $data;
    }

    public function index()
    {
        $pemasukan = DB::table('keuangan')
        ->where('jenis_keuangan', 'Pemasukan')
        ->get();

        $total = Keuangan::select(\DB::raw('SUM(jumlah) as total'))
        ->where('jenis_keuangan', 'Pemasukan')
        ->get();

        $data['title'] = $this->title;
        $data['menu'] = $this->menu;
        $data['subMenu'] = $this->subMenu;


        return view('keuangan.pemasukan', $this->prefix($data), ['pemasukan'=>$pemasukan, 'total'=>$total]);
        
    }

    public function store(Request $request){
        $request->validate([
            'judul' => 'required',
            'jumlah' => 'required',
            'nama_pemberi' => 'required',
            'tanggal' => 'required',

        ]);

        Keuangan::create([
            'judul' => $request->judul,
            'jumlah' => $request->jumlah,
            'nama_pemberi' => $request->nama_pemberi,
            'tanggal' => $request->tanggal,
            'jenis_keuangan' => 'Pemasukan',
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
            'jumlah' => 'required|numeric',
            'nama_pemberi' => 'required',
            'tanggal' => 'required',

        ]);

        $keuangan = Keuangan::find($id);
        $keuangan->judul   = $request->judul;
        $keuangan->jumlah   = $request->jumlah;
        $keuangan->nama_pemberi =$request->nama_pemberi;
        $keuangan->tanggal =$request->tanggal;
        $keuangan->jenis_keuangan  = 'Pemasukan';
        $keuangan->save();        
       

        return Response()->json('berhasil');

}

}