<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use App\Models\Masjid;
use App\Models\Kelas;
use App\Models\Murid;
use App\Models\Pengajar;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function dashboard()
    {
        $totalDaerah = Daerah::count();
        $totalMasjid = Masjid::count();
        $totalKelas = Kelas::count();
        $totalMurid = Murid::count();
        $totalPengajar = Pengajar::count();

        $pdf = Pdf::loadView(
            'laporan.dashboard',
            compact(
                'totalDaerah',
                'totalMasjid',
                'totalKelas',
                'totalMurid',
                'totalPengajar'
            )
        );

        return $pdf->download('laporan-dashboard.pdf');
    }
}