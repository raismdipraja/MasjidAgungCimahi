<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Api\Acara;
use Image;

class KegiatanislamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->viewPrefix = 'kegiatanislam';
        $this->title = "Kegiatan Islam";
        $this->menu = "Kegiatan Islam";
    }

    public function prefix($param = null)
    {
        $data['title'] = $this->title;
        $data['menu'] = $this->menu;

        if(isset($param)){
            foreach ($param as $index => $value) {
                $data[$index] = $value;
            }
        }

        return $data;
    }

    public function index()
    {
        $kegiatanislam = DB::table('acara')
        ->where('jenis_acara', 'KegiatanIslam')
        ->get();

        $data['title'] = $this->title;
        $data['menu'] = $this->menu;

        return view($this->viewPrefix ,$this->prefix($data), ['kegiatanislam'=>$kegiatanislam]);
        
    }

    public function store(Request $request){
        $request->validate([
            'nama_acara' => 'required',
            'gambar' => 'required|image',
        ]);

        if($request->hasFile('gambar'))
        $gambar =$request->file('gambar');
        $filename = time(). '.' .$gambar->getClientOriginalExtension();
        $location = public_path('image/'.$filename);
        Image::make($gambar)->save($location);
        $input['gambar'] = $filename;

        Acara::create([
            'nama_acara' => $request->nama_acara,
            'nama_ustad' => 'null',
            'gambar' => $filename,
            'jenis_acara' => 'KegiatanIslam',
        ]);

        
       

        return Response()->json('berhasil');

    }

    public function destroy(Request $request, $id){
        
        DB::table('acara')->where('id', $id)->delete();
       
        return Response()->json('berhasil');

    }

    public function edit($id){
        $kegiatanislam =   Acara::find($id);
        
        return $kegiatanislam;
       }


       public function update(Request $request, $id){
        $request->validate([
            'nama_acara' => 'required',
            'gambar' => 'required|image',
        ]);

        if($request->hasFile('gambar'))
        $gambar =$request->file('gambar');
        $filename = time(). '.' .$gambar->getClientOriginalExtension();
        $location = public_path('image/'.$filename);
        Image::make($gambar)->save($location);
        $input['gambar'] = $filename;

        $acara = Acara::find($id);
        $acara->nama_acara   = $request->nama_acara;
        $acara->nama_ustad   = 'null';
        $acara->gambar       = $filename;
        $acara->jenis_acara  = 'KegiatanIslam';
        $acara->save();        
       

        return Response()->json('berhasil');

    }


}
