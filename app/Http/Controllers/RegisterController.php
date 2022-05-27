<?php

namespace App\Http\Controllers;

use App\User;
use App\Lokasi;
use App\Shift;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    public function index(){
        $lokasi=Lokasi::all();
        $shift =Shift::all();
        return view('register',compact('lokasi','shift'));
    }

    public function register(Request $request){
        $kode_user = Str::random(6);
        // dd($request->username);
        // dd($request->s);
        $user = array(
            "username" => $request->username,
            "kode_user" => $kode_user,
            "nama" => $request->nama,
            "jabatan" => $request->jabatan,
            "email" => $request->email,
            "lokasi_kantor" => $request->lokasi_kantor,
            "shift" => $request->s,
           
            "password" => Hash::make($request->password),
            "status_user" => "0",
        );
        // dd($user);
        $new_user = new User();
        $new_user->fill($user);
        if($new_user->save()){
            return redirect('login')->with('berhasil','Berhasil Melakukan Pendaftaran');
        }else{
            return redirect('register')->with('gagal','Gagal Melakukan Pendaftaran');
        }
    }
}
