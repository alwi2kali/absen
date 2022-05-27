<?php

namespace App\Http\Controllers;
use App\Lokasi;
use App\Absen;
use App\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class StafController extends Controller
{
    public function index(){
        

        return view('staf.home');
    }
    public function absen(){
        $absen= Absen::with('User')->get();

        return view('staf.absen',compact('absen'));
    }

    public function lokasi(){
        $lokasi = Lokasi::all();
        $shift = Shift::all();
     
        return view('staf.lokasi',compact('lokasi','shift'));
    }

    public function shift(){
        $shift = Shift::all();
        return view('staf.shift',compact('shift'));
    }
    public function store_lokasi(Request $request){
        $data = array (
          'nama_kantor'      => $request->Nama_Kantor,
          'lokasi_kantor'    => $request->Lokasi_Kantor
        );
        $lokasi = new Lokasi();
        $lokasi->fill($data);
        if($lokasi->save()){
            return redirect(route('staf.lokasi'))->with('berhasil','Berhasil Menambahkan lokasi Baru');
        }else{
            return redirect(route('staf.lokasi'))->with('gagal','Gagal Menambahkan lokasi Baru');
        }
    }

    public function update_lokasi(Request $request){
        $lokasi= lokasi::where('nama_kantor',$request->Nama_Kantor)->first();
        // dd($request->Id);
        $lokasi->nama_kantor=$request->Nama_Kantor;
        $lokasi->lokasi_kantor=$request->Lokasi_Kantor;
       
        // dd($pegawai);
        if($lokasi->save()){
            return redirect(route('staf.lokasi'))->with('berhasil','Berhasil Mengubah lokasi');
        }else{
            return redirect(route('staf.lokasi'))->with('gagal','Gagal Mengubah lokasi');
        }
    }

    public function delete_pegawai($id){
        $deleted = Lokasi::where("id",$id)->delete();
        if($deleted){
            return redirect(route('staf.lokasi'))->with('berhasil','Berhasil Menghapus lokasi');
        }else{
            return redirect(route('staf.lokasi'))->with('gagal','Gagal Menghapus lokasi');
        }
    }

    
    public function store_shift(Request $request){
        $data = array (
          'nama_shift'           => $request->Nama_Shift,
          'jam_datang'           => $request->Jam_Datang,
          'jam_pulang'           => $request->Jam_Pulang
        );
        $shift = new Shift();
        $shift->fill($data);
        if($shift->save()){
            return redirect(route('staf.shift'))->with('berhasil','Berhasil Menambahkan shift Baru');
        }else{
            return redirect(route('staf.shift'))->with('gagal','Gagal Menambahkan shift Baru');
        }
    }
    public function update_shift(Request $request){
        $shift=Shift::where('id',$request->id)->first();
        // dd($shift);
        $shift->nama_shift=$request->Nama_Shift;
        $shift->jam_datang=$request->Jam_Datang;
        $shift->jam_pulang=$request->Jam_Pulang;
        // dd($pegawai);
        if($shift->save()){
            return redirect(route('staf.shift'))->with('berhasil','Berhasil Mengubah shift');
        }else{
            return redirect(route('staf.shift'))->with('gagal','Gagal Mengubah shift');
        }
    }
    public function delete_shift($id){
        $deleted = Shift::where("id",$id)->delete();
        if($deleted){
            return redirect(route('staf.shift'))->with('berhasil','Berhasil Menghapus shift');
        }else{
            return redirect(route('staf.shift'))->with('gagal','Gagal Menghapus shift');
        }
    }



}
