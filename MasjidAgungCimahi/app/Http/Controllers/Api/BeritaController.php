<?php

namespace App\Http\Controllers\Api;

use App\Api\Berita;
use Image;
use Illuminate\Http\Request;
use App\Http\Resources\BeritaResource as stuRe;


class BeritaController extends Controller
{
    public function index(Request $request){
        $berita = Berita::all();
        $response['status'] = true;
        $response['data'] = StuRe::collection($berita);
        return response()->json($response,200);
    }

    public function get(Request $request, $id){
        if(Berita::findOrFail($id)){
            $data['status'] = "Success!";
            $data['data'] = Berita::findOrFail($id);
        }else{
            $datap['status'] = "Empty!";
            $data['data'] = "";
        }
        return $data;
    }

    public function store(Request $request){
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required',
            'teks' => 'required',
        ]);

        
        $input['judul'] = $request->judul;
        $input['teks'] = $request->teks;

        if($request->hasFile('gambar'))
        $gambar =$request->file('gambar');
        $filename = time(). '.' .$gambar->getClientOriginalExtension();
        $location = public_path('image/'.$filename);
        Image::make($gambar)->save($location);
        $input['gambar'] = $filename;


        $berita = Berita::create($input);

       

        return [
            'status' => true,
            'message' => 'Data Berita berhasil ditambah',
            'data' => new stuRe($berita)
        ];
    }

    public function update(Request $request, Berita $berita, $id){
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required',
            'teks' => 'required',
        ]);

        $berita = Berita::find($id);
        $berita->judul = $request->judul;
        $berita->gambar = $request->gambar;
        $berita->teks = $request->teks;
        $berita->save();

        if($request->hasFile('gambar')){
            $gambar =$request->file('gambar');
            $filename = time(). '.' .$gambar->getClientOriginalExtension();
            $location = public_path('image/berita/'.$filename);
            Image::make($gambar)->save($location);
            $input['gambar'] = $filename;
            $oldImage = $berita->gambar;
            $this->deleteImage($oldImage);
        }

        return [
            'status' => true,
            'message' => 'Data Berita berhasil di ubah'
        ];
    }

    public function deleteImage($file)
    {
        if(file_exists(public_path('/image/berita/'.$file))){
            unlink(public_path('/image/berita/'.$file));
        }
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);
        $berita->delete();
        $this->deleteImage($berita->gambar);

        return [
            'status' => true,
            'message' => 'Data Berita berhasil dihapus'
        ];
    }
}
