<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    protected $table = 'tb_daerah';

    protected $fillable = [
        'nama',
        'alamat',
    ];

    public function masjid()
    {
        return $this->hasMany(Masjid::class, 'id_daerah');
    }
}