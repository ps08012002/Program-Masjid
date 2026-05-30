<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use App\Models\Kelas;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Pengajar::with('kelas');

    // User hanya melihat pengajar masjid sendiri
    if (auth()->user()->role != 'admin') {

        $query->whereHas('kelas', function ($q) {

            $q->where(
                'id_masjid',
                auth()->user()->id_masjid
            );

        });
    }

    // Search
    if ($request->filled('search')) {

        $query->where(
            'nama',
            'like',
            '%' . $request->search . '%'
        );
    }

    // Filter Kelas
    if ($request->filled('kelas')) {

        $query->where(
            'id_kelas',
            $request->kelas
        );
    }

    // Sort
    if ($request->sort == 'asc') {

        $query->orderBy('nama');

    } elseif ($request->sort == 'desc') {

        $query->orderByDesc('nama');

    } else {

        $query->latest();

    }

    $pengajar = $query
        ->paginate(10)
        ->withQueryString();

    // Dropdown kelas
    if (auth()->user()->role == 'admin') {

        $kelas = Kelas::with('masjid')
            ->orderBy('nama')
            ->get();

    } else {

        $kelas = Kelas::with('masjid')
            ->where(
                'id_masjid',
                auth()->user()->id_masjid
            )
            ->orderBy('nama')
            ->get();

    }

    return view(
        'pengajar.index',
        compact(
            'pengajar',
            'kelas'
        )
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
if (auth()->user()->role == 'admin') {

    $kelas = Kelas::orderBy('nama')->get();

} else {

    $kelas = Kelas::where(
        'id_masjid',
        auth()->user()->id_masjid
    )->get();

}

    return view('pengajar.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required|max:255',
        'nomer_tlpn' => 'required|max:20',
        'id_kelas' => 'required|exists:tb_kelas,id',
    ]);

    if (auth()->user()->role != 'admin') {

    $kelasValid = Kelas::where(
        'id',
        $request->id_kelas
    )
    ->where(
        'id_masjid',
        auth()->user()->id_masjid
    )
    ->exists();

    if (!$kelasValid) {
        abort(403);
    }
}
    Pengajar::create([
        'nama' => $request->nama,
        'nomer_tlpn' => $request->nomer_tlpn,
        'id_kelas' => $request->id_kelas,
    ]);

    return redirect()
        ->route('pengajar.index')
        ->with('success', 'Data pengajar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
$pengajar = Pengajar::with('kelas')
    ->findOrFail($id);

if (
    auth()->user()->role != 'admin'
    &&
    $pengajar->kelas->id_masjid != auth()->user()->id_masjid
) {
    abort(403);
}

if (auth()->user()->role == 'admin') {

    $kelas = Kelas::orderBy('nama')->get();

} else {

    $kelas = Kelas::where(
        'id_masjid',
        auth()->user()->id_masjid
    )
    ->orderBy('nama')
    ->get();
}

    return view('pengajar.edit', compact(
        'pengajar',
        'kelas'
    ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'nama' => 'required|max:255',
        'nomer_tlpn' => 'required|max:20',
        'id_kelas' => 'required|exists:tb_kelas,id',
    ]);

$pengajar = Pengajar::with('kelas')
    ->findOrFail($id);

if (
    auth()->user()->role != 'admin'
    &&
    $pengajar->kelas->id_masjid != auth()->user()->id_masjid
) {
    abort(403);
}

if (auth()->user()->role != 'admin') {

    $kelasValid = Kelas::where(
        'id',
        $request->id_kelas
    )
    ->where(
        'id_masjid',
        auth()->user()->id_masjid
    )
    ->exists();

    if (!$kelasValid) {
        abort(403);
    }
}

    $pengajar->update([
        'nama' => $request->nama,
        'nomer_tlpn' => $request->nomer_tlpn,
        'id_kelas' => $request->id_kelas,
    ]);

    return redirect()
        ->route('pengajar.index')
        ->with('success', 'Data pengajar berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
$pengajar = Pengajar::with('kelas')
    ->findOrFail($id);

if (
    auth()->user()->role != 'admin'
    &&
    $pengajar->kelas->id_masjid != auth()->user()->id_masjid
) {
    abort(403);
}

$pengajar->delete();

    return redirect()
        ->route('pengajar.index')
        ->with('success', 'Data pengajar berhasil dihapus');
    }
}
