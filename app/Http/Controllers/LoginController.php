<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LoginController extends Controller
{

    public function index(){

        return view('login');
    }
    public function verify(Request $request){
        $user = User::where("username",$request->username)->first();
        $userr = $user->nama;
        if($user === null) {
            return redirect('login')->with('gagal','Email/No Telepon atau Password Salah');
        }
        if(Hash::check($request->password,$user['password'])){
            $data = array(
                "username" => $user['username'],
                "kode_user" => $user['kode_user'],
                "status" => $user['status_user'],
                "nama" => $user['nama'],
            );
            $request->session()->put('users',$data);
            switch ($user['status_user']){
                case "1" :  return Redirect::route('staf');
                    break;
                case "0" : return Redirect::route('user');
                    break;
            }
        }else{
            return redirect('login')->with('gagal','Username atau Password Salah');
        }
    }


    public function register_dummy(){
        $kode_user = Str::random(6);
        $user = array(
            "username" => "stafadmin",
            "kode_user" => $kode_user,
            "status" => 1,
            "nama" => "staf admin",
            "nama_orgtua" => "-",
            "alamat" => "-",
            "tempat_lhr" => "-",
            "tgl_lhr" => "2020-02-15",
            "status_user" => "1",
            "password" => Hash::make("stafadmin123")
        );

        $new_user = new User();
        $new_user->fill($user);
        if($new_user->save()){
            die("Berhasil");
        }else{
            die("Gagal");
        }
    }

    public function logout(Request $request){
        $request->session()->remove('users');
        return redirect('login');
    }
}
