<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public $primaryKey = 'id';
    protected $table = 'user';
    public $timestamps = false;
    protected $fillable = [
        'username',
        'password',
        'nama',
        'kode_user',
        'jabatan',
        'email',
        'lokasi_kantor',
        'shift',
        "status_user"
        
    ];
    public function Shift ()
    {
        return $this->belongsTo(Shift::class,'shift','nama_shift');
    }
    public function Lokasi ()
    {
        return $this->belongsTo(Lokasi::class,'lokasi_kantor','lokasi_kantor');
    }
    public function Absen()
    {
        return $this->hasMany(Absen::class);
    }

}
