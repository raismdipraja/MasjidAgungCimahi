<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
            'role' => ''
        ]);

        if($validator->fails())
        {
            return response()->json($validator->messages(), 200);
        }

        $user = User::where('email', $request->email)->first();

       
        if($user !=null)
        {
            if(\Hash::check($request->password, $user->password))
            
            {
                $response['status'] = true;
                $response['message'] = 'Login Berhasil';
                $response['data'] = [
                    'nama' =>$user->nama,
                    'email'=>$user->email
                ];
            }else{
                $response['status'] = false;
                $response['message'] = 'Login Gagal,Password Salah';
            }
        }else{
            $response['status']= false;
            $response['message'] = 'Email Tidak Terdaftar';
        }
            return response()->json($response,200);

    }
}
