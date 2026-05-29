<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'tb_kelas';

    protected $fillable = [
        'nama',
        'id_masjid',
    ];

    public function masjid()
    {
        return $this->belongsTo(Masjid::class, 'id_masjid');
    }

    public function murid()
    {
        return $this->hasMany(Murid::class, 'id_kelas');
    }

    public function pengajar()
    {
        return $this->hasMany(Pengajar::class, 'id_kelas');
    }
}