<?php

namespace App\Http\Controllers\Api;

use App\Api\PengajianRutin;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PengajianRutinController extends Controller
{
    public function index(Request $request){
        $data['status'] = "Success!";
        $data['data'] = PengajianRutin::all();
        return $data;
    }

    public function indexpengajiansenin(Request $request){
        $data['status'] = "Success!";
        $data['data'] = DB::table('pengajian_rutin')
        ->where('hari', 'Senin')
        ->get();

        return $data;

    }

    public function indexpengajianselasa(Request $request){
        $data['status'] = "Success!";
        $data['data'] = DB::table('pengajian_rutin')
        ->where('hari', 'Selasa')
        ->get();

        return $data;

    }

    public function indexpengajianrabu(Request $request){
        $data['status'] = "Success!";
        $data['data'] = DB::table('pengajian_rutin')
        ->where('hari', 'Rabu')
        ->get();

        return $data;

    }

    public function indexpengajiankamis(Request $request){
        $data['status'] = "Success!";
        $data['data'] = DB::table('pengajian_rutin')
        ->where('hari', 'Kamis')
        ->get();

        return $data;

    }

    public function indexpengajianjumat(Request $request){
        $data['status'] = "Success!";
        $data['data'] = DB::table('pengajian_rutin')
        ->where('hari', 'Jumat')
        ->get();

        return $data;

    }

    public function indexpengajianSabtu(Request $request){
        $data['status'] = "Success!";
        $data['data'] = DB::table('pengajian_rutin')
        ->where('hari', 'Sabtu')
        ->get();

        return $data;

    }

    public function indexpengajianMinggu(Request $request){
        $data['status'] = "Success!";
        $data['data'] = DB::table('pengajian_rutin')
        ->where('hari', 'Minggu')
        ->get();

        return $data;

    }

    public function get(Request $request, $id){
        if(PengajianRutin::findOrFail($id)){
            $data['status'] = "Success!";
            $data['data'] = PengajianRutin::findOrFail($id);
        }else{
            $datap['status'] = "Empty!";
            $data['data'] = "";
        }
        return $data;
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

        return [
            'status' => true,
            'message' => 'Data Pengajian Rutin berhasil ditambah'
        ];
    }

    public function update(Request $request, PengajianRutin $pengajianrutin, $id){
        $request->validate([
            'judul' => 'required',
            'nama_ustad' => 'required',
            'hari' => 'required',
            'jam' => 'required',
        ]);

        $pengajianrutin = PengajianRutin::find($id);
        $pengajianrutin->judul = $request->judul;
        $pengajianrutin->nama_ustad = $request->nama_ustad;
        $pengajianrutin->hari = $request->hari;
        $pengajianrutin->jam = $request->jam;
        $pengajianrutin->save();

        return [
            'status' => true,
            'message' => 'Data Pengajian Rutin berhasil di ubah'
        ];
    }

    public function destroy($id)
    {
        $pengajianrutin = PengajianRutin::find($id);
        $pengajianrutin->delete();

        return [
            'status' => true,
            'message' => 'Data Berita berhasil dihapus'
        ];
    }
}
