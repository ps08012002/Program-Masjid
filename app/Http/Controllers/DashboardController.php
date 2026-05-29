<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use App\Models\Masjid;
use App\Models\Kelas;
use App\Models\Murid;
use App\Models\Pengajar;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
public function index()
{
    if (auth()->user()->role == 'admin') {

        $totalDaerah = Daerah::count();
        $totalMasjid = Masjid::count();
        $totalKelas = Kelas::count();
        $totalMurid = Murid::count();
        $totalPengajar = Pengajar::count();

    } else {

        $idMasjid = auth()->user()->id_masjid;

        $totalDaerah = 1;

        $totalMasjid = 1;

        $totalKelas = Kelas::where(
            'id_masjid',
            $idMasjid
        )->count();

        $kelasIds = Kelas::where(
            'id_masjid',
            $idMasjid
        )->pluck('id');

        $totalMurid = Murid::whereIn(
            'id_kelas',
            $kelasIds
        )->count();

        $totalPengajar = Pengajar::whereIn(
            'id_kelas',
            $kelasIds
        )->count();
    }

    $ringkasanMasjid = Masjid::with('daerah')
    ->withCount('kelas')
    ->get();

foreach ($ringkasanMasjid as $masjid) {

    $kelasIds = Kelas::where(
        'id_masjid',
        $masjid->id
    )->pluck('id');

    $masjid->murid_count = Murid::whereIn(
        'id_kelas',
        $kelasIds
    )->count();

    $masjid->pengajar_count = Pengajar::whereIn(
        'id_kelas',
        $kelasIds
    )->count();
}

$grafikMurid = Masjid::all()
    ->map(function ($masjid) {

        $kelasIds = Kelas::where(
            'id_masjid',
            $masjid->id
        )->pluck('id');

        return [
            'nama' => $masjid->nama,
            'jumlah' => Murid::whereIn(
                'id_kelas',
                $kelasIds
            )->count()
        ];
    });
 
    $topMasjid = $grafikMurid
    ->sortByDesc('jumlah')
    ->take(5);
 return view('dashboard', compact(
    'totalDaerah',
    'totalMasjid',
    'totalKelas',
    'totalMurid',
    'totalPengajar',
    'ringkasanMasjid',
    'grafikMurid',
    'topMasjid'
));
}
}