<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

use App\Api\Berita;
use Image;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->viewPrefix = 'berita';
        $this->title = "Berita";
        $this->menu = "Berita";
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
        $berita = DB::table('berita')->get();

        $data['title'] = $this->title;
        $data['menu'] = $this->menu;

        return view($this->viewPrefix ,$this->prefix($data), ['berita'=>$berita]);
        
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
                     \"title\":\"Berita\",\r\n      
                     \"body\":\"$request->teks\"\r\n
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
            'judul' => 'required',
            'gambar' => 'required|image',
            'teks' => 'required',
        ]);

        if($request->hasFile('gambar'))
        $gambar =$request->file('gambar');
        $filename = time(). '.' .$gambar->getClientOriginalExtension();
        $location = public_path('image/'.$filename);
        Image::make($gambar)->save($location);
        $input['gambar'] = $filename;

        Berita::create([
            'judul' => $request->judul,
            'gambar' => $filename,
            'teks' => $request->teks,
        ]);

        return Response()->json('berhasil');

    }

    public function destroy(Request $request, $id){
        
        DB::table('berita')->where('id', $id)->delete();
       
        return Response()->json('berhasil');

    }

    public function edit($id){
        $berita =   Berita::find($id);
        
        return $berita;
       }


       public function update(Request $request, $id){
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image',
            'teks' => 'required',

        ]);

        if($request->hasFile('gambar'))
        $gambar =$request->file('gambar');
        $filename = time(). '.' .$gambar->getClientOriginalExtension();
        $location = public_path('image/'.$filename);
        Image::make($gambar)->save($location);
        $input['gambar'] = $filename;

        $acara = Berita::find($id);
        $acara->judul   = $request->judul;
        $acara->gambar       = $filename;
        $acara->teks   = $request->teks;

        $acara->save();        
       

        return Response()->json('berhasil');

    }
}
