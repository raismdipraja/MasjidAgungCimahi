<?php

namespace App\Http\Controllers\Api;

use App\Api\Keuangan;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KeuanganController extends Controller
{
    public function index(Request $request){
        $data['status'] = "Success!";
        $data['data'] = Keuangan::all();
        return $data;
    }

    public function indexpemasukan(Request $request){
        $data['status'] = "Success!";
        $data['data'] = DB::table('keuangan')
        ->where('jenis_keuangan', 'Pemasukan')
        ->get();
       

        return $data;

    }

    public function jumlahpemasukan(Request $request){
        $data['status'] = "Success!";
        $data['data'] = Keuangan::select(\DB::raw("SUM(jumlah)"))
        ->where('jenis_keuangan','pemasukan')
        ->get();
        return $data;

    }


    public function indexjumlahpengeluaran(Request $request){
        $data['status'] = "Success!";
        $data['data'] = Keuangan::select(\DB::raw("SUM(pengeluaran)"))
        ->get();
        return $data;

    }

    public function indexjumlahtotal(Request $request){
        $data['status'] = "Success!";
        $data['data'] = Keuangan::select(\DB::raw("SUM(jumlah-pengeluaran)"))->get();


        
       return $data;


    }
    

    public function indexpengeluaran(Request $request){
        $data['status'] = "Success!";
        $data['data'] = DB::table('keuangan')
        ->where('jenis_keuangan', 'Pengeluaran')
        ->get();

        return $data;

    }

    public function get(Request $request, $id){
        if(Keuangan::findOrFail($id)){
            $data['status'] = "Success!";
            $data['data'] = Keuangan::findOrFail($id);
        }else{
            $datap['status'] = "Empty!";
            $data['data'] = "";
        }
        return $data;
    }

    public function store(Request $request){
        $request->validate([
            'judul' => 'required',
            'jumlah' => '',
            'pengeluaran' => '',
            'nama_pemberi' => '',
            'tanggal' => 'required',
            'jenis_keuangan' => 'required',
        ]);

        Keuangan::create([
            'judul' => $request->judul,
            'jumlah' => $request->jumlah,
            'pengeluaran' => $request->pengeluaran,
            'nama_pemberi' => $request->nama_pemberi,
            'tanggal' => $request->tanggal,
            'jenis_keuangan' => $request->jenis_keuangan,
        ]);

       
        return [
            'status' => true,
            'message' => 'Data Keuangan berhasil ditambah'
        ];
    }

    public function update(Request $request, Keuangan $keuangan, $id){
        $request->validate([
            'judul' => 'required',
            'jumlah' => 'required',
            'jenis_keuangan' => 'required',
        ]);

        $keuangan = Keuangan::find($id);
        $keuangan->judul = $request->judul;
        $keuangan->jumlah = $request->jumlah;
        $keuangan->jenis_keuangan = $request->jenis_keuangan;
        $keuangan->save();

        return [
            'status' => true,
            'message' => 'Data Keuangan berhasil di ubah'
        ];
    }


    public function destroy($id)
    {
        $keuangan = Keuangan::find($id);
        $keuangan->delete();

        return [
            'status' => true,
            'message' => 'Data Berita berhasil dihapus'
        ];
    }
}
