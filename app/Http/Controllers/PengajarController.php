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
    public function index()
    {
if (auth()->user()->role == 'admin') {

        $pengajar = Pengajar::with(['kelas'])
            ->latest()
            ->paginate(10);

    } else {

        $pengajar = Pengajar::with(['kelas'])
            ->whereHas('kelas', function ($query) {

                $query->where(
                    'id_masjid',
                    auth()->user()->id_masjid
                );

            })
            ->latest()
            ->paginate(10);

    }

    return view('pengajar.index', compact('pengajar'));
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

    $kelas = Kelas::orderBy('nama')->get();

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

    $pengajar = Pengajar::findOrFail($id);

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
            $pengajar = Pengajar::findOrFail($id);

    $pengajar->delete();

    return redirect()
        ->route('pengajar.index')
        ->with('success', 'Data pengajar berhasil dihapus');
    }
}
