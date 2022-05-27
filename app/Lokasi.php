<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    public $primaryKey = 'id';
    protected $table = 'lokasi';
    public $timestamps = false;
    protected $fillable = [
        'nama_kantor',
        'lokasi_kantor'

    ];
    public function Absen()
    {
        return $this->hasMany(Absen::class);
    }
}
