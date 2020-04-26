<?php

namespace App\Http\Controllers\Api;

use App\Api\Acara;
use Image;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AcaraController extends Controller
{
    public function index(Request $request){
        $data['status'] = "Success!";
        $data['data'] = Acara::all();
        return $data;
    }

    public function indexkajian(Request $request){
        $data['status'] = "Success!";
        $data['data'] = DB::table('acara')
        ->where('jenis_acara', 'Kajian')
        ->get();

        return $data;

    }

    public function indexpelatihan(Request $request){
        $data['status'] = "Success!";
        $data['data'] = DB::table('acara')
        ->where('jenis_acara', 'Pelatihan')
        ->get();

        return $data;

    }

    public function indexkegiatanislam(Request $request){
        $data['status'] = "Success!";
        $data['data'] = DB::table('acara')
        ->where('jenis_acara', 'KegiatanIslam')
        ->get();

        return $data;

    }

    public function get(Request $request, $id){
        if(Acara::findOrFail($id)){
            $data['status'] = "Success!";
            $data['data'] = Acara::findOrFail($id);
        }else{
            $datap['status'] = "Empty!";
            $data['data'] = "";
        }
        return $data;
    }

    public function store(Request $request){
        $request->validate([
            'nama_acara' => 'required',
            'nama_ustad' => 'required',
            'gambar' => 'required|image',
            'jenis_acara' => 'required',
        ]);

        if($request->hasFile('gambar'))
        $gambar =$request->file('gambar');
        $filename = time(). '.' .$gambar->getClientOriginalExtension();
        $location = public_path('image/'.$filename);
        Image::make($gambar)->save($location);
        $input['gambar'] = $filename;

        Acara::create([
            'nama_acara' => $request->nama_acara,
            'nama_ustad' => $request->nama_ustad,
            'gambar' => $filename,
            'jenis_acara' => $request->jenis_acara,
        ]);

        
       

        return [
            'status' => true,
            'message' => 'Data Acara berhasil ditambah'
        ];
    }


    public function update(Request $request, Acara $acara, $id){
        $request->validate([
            'nama_acara' => 'required',
            'nama_ustad' => 'required',
            'gambar' => 'required',
            'jenis_acara' => 'required',
        ]);

        $acara = Acara::find($id);
        $acara->nama_acara = $request->nama_acara;
        $acara->nama_ustad = $request->nama_ustad;
        $acara->gambar = $request->gambar;
        $acara->jenis_acara = $request->jenis_acara;
        $acara->save();

        if($request->hasFile('gambar')){
            $gambar =$request->file('gambar');
            $filename = time(). '.' .$gambar->getClientOriginalExtension();
            $location = public_path('image/'.$filename);
            Image::make($gambar)->save($location);
            $input['gambar'] = $filename;
            $oldImage = $acara->gambar;
            $this->deleteImage($oldImage);
        }

        return [
            'status' => true,
            'message' => 'Data Acara berhasil di ubah'
        ];
    }

    public function deleteImage($file)
    {
        if(file_exists(public_path('/image'.$file))){
            unlink(public_path('/image'.$file));
        }
    }

    public function destroy($id)
    {
        $acara = Acara::find($id);
        $acara->delete();
        $this->deleteImage($acara->gambar);

        return [
            'status' => true,
            'message' => 'Data Barang berhasil dihapus'
        ];
    }
}
