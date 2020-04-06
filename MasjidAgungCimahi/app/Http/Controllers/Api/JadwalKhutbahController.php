<?php

namespace App\Http\Controllers\Api;

use App\Api\JadwalKhutbah;
use Image;
use Illuminate\Http\Request;

class JadwalKhutbahController extends Controller
{
    public function index(Request $request){
        $data['status'] = "Success!";
        $data['data'] = JadwalKhutbah::all();
        return $data;
    }

    public function get(Request $request, $id){
        if(JadwalKhutbah::findOrFail($id)){
            $data['status'] = "Success!";
            $data['data'] = JadwalKhutbah::findOrFail($id);
        }else{
            $datap['status'] = "Empty!";
            $data['data'] = "";
        }
        return $data;
    }

    public function store(Request $request){
        $request->validate([
            'nama_ustad' => 'required',
        ]);

        JadwalKhutbah::create([
            'nama_ustad' => $request->nama_ustad,
        ]);

        return [
            'status' => true,
            'message' => 'Data Jadwal Khhutbah berhasil ditambah'
        ];
    }

    public function update(Request $request, JadwalKhutbah $jadwalkhutbah, $id){
        $request->validate([
            'nama_ustad' => 'required',
        ]);

        $jadwalkhutbah = JadwalKhutbah::find($id);
        $jadwalkhutbah->nama_ustad = $request->nama_ustad;
        $jadwalkhutbah->save();

        return [
            'status' => true,
            'message' => 'Data Jadwal Khutbah berhasil di ubah'
        ];
    }

    public function destroy($id)
    {
        $jadwalkhutbah = JadwalKhutbah::find($id);
        $jadwalkhutbah->delete();

        return [
            'status' => true,
            'message' => 'Data Berita berhasil dihapus'
        ];
    }
}
