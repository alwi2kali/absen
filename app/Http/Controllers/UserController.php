<?php

namespace App\Http\Controllers;
use DateTime;


use App\User;
use App\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(Request $request){
        $user=$request->session()->get("users")['username'];
        $absen=Absen::where('id_pegawai',$user)->get();
       
        $id_user=$request->session()->get("users")['kode_user'];
  
        // dd($user);
        return view('pegawai.home',compact('user','id_user','absen'));
    }
    
    public function absen_masuk(Request $request){
        $id_user=$request->session()->get("users")['kode_user'];
        $user=$request->session()->get("users")['username'];
        
        date_default_timezone_set('Asia/Jakarta');
        $ldate = new DateTime('now');
        $tanggal=$ldate->format('d-m-Y');
        $jam=$ldate->format('H:i');
        $keterangan="belum ada";
        $user1 = User ::with('shift')-> where ('username',$user)->first();
        $batas= $user1->Shift->jam_datang;
        $cek= Absen::where(['id_pegawai'=>$user,'tanggal'=>$tanggal])->first();
       
        
        // dd($cek);
        
            if (is_null($cek)){
                
           if($jam < $batas){
            $keterangan ="hadir";
            }   
          else{
            $keterangan="terlambat";
            }  
            $data1 = array (
                'id_pegawai'      => $user,
                'tanggal'         => $tanggal,
                'jam_masuk'       => $jam, 
                'keterangan'      => $keterangan
              );
            //   dd($data1);
              $absen = new Absen();
              $absen->fill($data1);
              if($absen->save()){
                  return redirect(route('user'))->with('berhasil','telah melakukan absen');
              
              } 

            }
            else {
                return redirect(route('user'))->with('gagal','telah melakukan absen');

            }
            

            
          
    } 
    public function absen_pulang(Request $request){
        $id_user=$request->session()->get("users")['kode_user'];
        $user=$request->session()->get("users")['username'];
        
        date_default_timezone_set('Asia/Jakarta');
        $ldate = new DateTime('now');
        $tanggal=$ldate->format('d-m-Y');
        $jam=$ldate->format('H:i');
        $keterangan="belum ada";
        $user1 = User ::with('shift')-> where ('username',$user)->first();
        $batas= $user1->Shift->jam_pulang;
        $cek= Absen::where(['id_pegawai'=>$user,'tanggal'=>$tanggal])->first();
       
        
        // dd($cek);
        
            if (is_null($cek->jam_pulang)){
                
           if($jam < $batas){
            $keterangan ="pulang cepat";
            } 
           
          else{
            $keterangan="normal";
            }  
           $cek->jam_pulang=$jam;
           $cek->keterangan_pulang=$keterangan;
            //   dd($data1);
             
              if($cek->save()){
                  return redirect(route('user'))->with('berhasil','telah melakukan absen');
              
              } 

            }
            else {
                return redirect(route('user'))->with('gagal','telah melakukan absen');

            }
            

            
          
    } 

   
}
