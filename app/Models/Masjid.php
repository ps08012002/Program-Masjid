<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    protected $table = 'tb_masjid';

    protected $fillable = [
        'nama',
        'alamat',
        'id_daerah',
    ];

    public function daerah()
    {
        return $this->belongsTo(Daerah::class, 'id_daerah');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_masjid');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id_masjid');
    }

    public function isAdmin()
{
    return $this->role === 'admin';
}
}