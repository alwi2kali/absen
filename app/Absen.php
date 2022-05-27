<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
   
    
    public $primaryKey = 'id';
    protected $table = 'absen';
    public $timestamps = false;
    protected $fillable = [
        'id_pegawai',
        'tanggal',
        'jam_masuk',
        'jam_pulang',
        'keterangan'

    ];
    public function User()
    {
        return $this->belongsTo(User::class,'id_pegawai','username');
    }
   
}
