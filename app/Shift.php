<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    public $primaryKey = 'id';
    protected $table = 'shift';
    public $timestamps = false;
    protected $fillable = [
        'nama_shift',
        'jam_datang',
        'jam_pulang'

    ];
    public function Absen()
{
    return $this->hasMany(Absen::class);
}
}
