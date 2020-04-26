<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Api\Acara;
use Image;



class KajianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->viewPrefix = 'Kajian';
        $this->title = "Kajian";
        $this->menu = "Kajian";
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
        $kajian = DB::table('acara')
        ->where('jenis_acara', 'Kajian')
        ->get();

        $data['title'] = $this->title;
        $data['menu'] = $this->menu;

        return view($this->viewPrefix , $this->prefix($data), ['kajian'=>$kajian]);
        
    }


    public function store(Request $request){
        $request->validate([
            'nama_acara' => 'required',
            'nama_ustad' => 'required',
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
            'nama_ustad' => $request->nama_ustad,
            'gambar' => $filename,
            'jenis_acara' => 'Kajian',
        ]);

        
       

        return Response()->json('berhasil');

    }



    public function destroy(Request $request, $id)
    {
        
        DB::table('acara')->where('id', $id)->delete();
       
        return Response()->json('berhasil');

    }
    

    public function edit($id){
     $kajian =   Acara::find($id);
     
     return $kajian;
    }


    public function update(Request $request, $id){
        $request->validate([
            'nama_acara' => 'required',
            'nama_ustad' => 'required',
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
        $acara->nama_ustad   = $request->nama_ustad;
        $acara->gambar       = $filename;
        $acara->jenis_acara  = 'Kajian';
        $acara->save();        
       

        return Response()->json('berhasil');

    }
    
}
