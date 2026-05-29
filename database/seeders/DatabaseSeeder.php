<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Daerah;
use App\Models\Masjid;
use App\Models\Kelas;
use App\Models\Murid;
use App\Models\Pengajar;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
    ['username' => 'ps08012002'],
    [
        'name' => 'Putra Sangaji',
        'password' => bcrypt('12345678'),
        'role' => 'admin',
        'id_masjid' => null
    ]
);

        // 10 Daerah
        for ($i = 1; $i <= 10; $i++) {

            $daerah = Daerah::create([
                'nama' => 'Daerah '.$i,
                'alamat' => 'Alamat Daerah '.$i
            ]);

            // 3 Masjid per daerah
            for ($j = 1; $j <= 3; $j++) {

                $masjid = Masjid::create([
                    'nama' => 'Masjid '.$i.'-'.$j,
                    'alamat' => 'Alamat Masjid '.$i.'-'.$j,
                    'id_daerah' => $daerah->id
                ]);

                // 3 Kelas per masjid
                for ($k = 1; $k <= rand(2, 5); $k++) {

    $kelas = Kelas::create([
        'nama' => 'Kelas '.$k,
        'id_masjid' => $masjid->id
    ]);

    $jumlahMurid = rand(5, 40);

    for ($m = 1; $m <= $jumlahMurid; $m++) {

        Murid::create([
            'nama' => fake()->name(),
            'foto' => null,
            'id_kelas' => $kelas->id
        ]);
    }

    $jumlahPengajar = rand(1, 3);

    for ($p = 1; $p <= $jumlahPengajar; $p++) {

        Pengajar::create([
            'nama' => fake()->name(),
            'nomer_tlpn' => '08'.rand(111111111,999999999),
            'id_kelas' => $kelas->id
        ]);
    }
}
        }
    }
    User::updateOrCreate(
    ['username' => 'arra'],
    [
        'name' => 'Ajeng Ar-rayyan Ramadhan',
        'password' => bcrypt('12345678'),
        'role' => 'user',
        'id_masjid' => 1
    ]
);
}}