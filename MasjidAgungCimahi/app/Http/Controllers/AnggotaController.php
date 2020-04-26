<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AnggotaController extends Controller
{

    protected $redirectTo = RouteServiceProvider::ANGGOTA;


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $anggota = DB::table('users')
        ->where('role', 'dkm')
        ->get();


        return view('anggota', ['anggota'=>$anggota]);
        
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'password' => 'required',

        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' =>Hash::make($request['password']),
        ]);

        return Response()->json('berhasil');

    }

    public function destroy(Request $request, $id)
    {
        
        DB::table('users')->where('id', $id)->delete();
       
        return Response()->json('berhasil');

    }

    public function edit($id){
        $anggota =   User::find($id);
        
        return $anggota;
       }
   
   
       public function update(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'password' => 'required',

        ]);
   
           $acara = User::find($id);
           $acara->nama   = $request->nama;
           $acara->email   = $request->email;
           $acara->alamat   = $request->alamat;
           $acara->password  = Hash::make($request['password']);
           $acara->save();        
          
   
           return Response()->json('berhasil');
   
       }
}
