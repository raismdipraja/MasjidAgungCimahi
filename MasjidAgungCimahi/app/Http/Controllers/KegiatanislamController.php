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
        // Awal Kode Notifikasi
        $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\r\n  
                \"to\":\"/topics/all\",\r\n  
                \"notification\": {\r\n 
                     \"title\":\"Kegiatan Islam\",\r\n      
                     \"body\":\"$request->nama_acara\"\r\n
                      }\r\n}",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: key=AAAAuX_aHJw:APA91bEChGvVgBbzxkLWhEhpMfSmJ1cSR-JbqAfjJP-BsZ3LXaxbbg_aTWXgn2p4EIQfUQJvgxc4XrXw52tCIRMqDQHuo7ShPRyio1vxhW8Cyzgrg4vgdAqDuvQPYD0KCWg7_1fLW2Kz",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $jsonResponse = json_decode($response, true);
        curl_close($curl);
        header("content-type: application/json");
        if ($err) {
            return "cURL Error #:" . $err;
        }
        // Akhir Kode Notifikasi


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
