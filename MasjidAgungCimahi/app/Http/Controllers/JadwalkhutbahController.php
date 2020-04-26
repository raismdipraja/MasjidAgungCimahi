<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Api\JadwalKhutbah;


class JadwalkhutbahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->title = "Jadwal Khutbah";
        $this->menu = "Jadwal Khutbah";
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
        $jadwalkhutbah= JadwalKhutbah::All();

        $data['title'] = $this->title;
        $data['menu'] = $this->menu;

        return view('jadwalkhutbah' , $this->prefix($data), ['jadwalkhutbah'=>$jadwalkhutbah]);
        
    }

    public function store(Request $request){
        $request->validate([
            'nama_ustad' => 'required',
            'tanggal' => 'required',

        ]);

        JadwalKhutbah::create([
            'nama_ustad' => $request->nama_ustad,
            'tanggal' => $request->tanggal,

        ]);

  return Response()->json('berhasil');

    }

    public function destroy(Request $request, $id)
    {
        
        DB::table('jadwal_khutbah')->where('id', $id)->delete();
       
        return Response()->json('berhasil');

    }

    public function edit($id){
        $jadwalkhutbah =   JadwalKhutbah::find($id);
        
        return $jadwalkhutbah;
       }
   
   
       public function update(Request $request, $id){
           $request->validate([
               'nama_ustad' => 'required',
               'tanggal' => 'required',

           ]);
   
           $acara = JadwalKhutbah::find($id);
           $acara->nama_ustad   = $request->nama_ustad;
           $acara->tanggal   = $request->tanggal;
           $acara->save();        
          
   
           return Response()->json('berhasil');
   
       }
}
