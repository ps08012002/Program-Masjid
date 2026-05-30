<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Masjid;


class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
  
        if (auth()->user()->role == 'admin') {

        $kelas = Kelas::with('masjid')
            ->latest()
            ->paginate(10);

    } else {

        $kelas = Kelas::with('masjid')
            ->where(
                'id_masjid',
                auth()->user()->id_masjid
            )
            ->latest()
            ->paginate(10);

    }

    return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
 
    if (auth()->user()->role == 'admin') {

        $masjid = Masjid::orderBy('nama')->get();

    } else {

        $masjid = Masjid::where(
            'id',
            auth()->user()->id_masjid
        )->get();

    }

    return view('kelas.create', compact('masjid'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $request->validate([
        'nama' => 'required|max:255',
        'id_masjid' => 'required|exists:tb_masjid,id',
    ]);
if(auth()->user()->role != 'admin')
{
    $idMasjid = auth()->user()->id_masjid;
}
else
{
    $idMasjid = $request->id_masjid;
}

Kelas::create([
    'nama' => $request->nama,
    'id_masjid' => $idMasjid,
]);

    return redirect()
        ->route('kelas.index')
        ->with('success', 'Data kelas berhasil ditambahkan');

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

    if (auth()->user()->role == 'admin') {

        $kelas = Kelas::findOrFail($id);

        $masjid = Masjid::orderBy('nama')->get();

    } else {

        $kelas = Kelas::where(
            'id',
            $id
        )->where(
            'id_masjid',
            auth()->user()->id_masjid
        )->firstOrFail();

        $masjid = Masjid::where(
            'id',
            auth()->user()->id_masjid
        )->get();
    }

    return view('kelas.edit', compact(
        'kelas',
        'masjid'
    ));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    $request->validate([
        'nama' => 'required|max:255',
        'id_masjid' => 'required|exists:tb_masjid,id',
    ]);

    if (auth()->user()->role == 'admin') {

    $kelas = Kelas::findOrFail($id);

    $idMasjid = $request->id_masjid;

} else {

    $kelas = Kelas::where(
        'id',
        $id
    )->where(
        'id_masjid',
        auth()->user()->id_masjid
    )->firstOrFail();

    $idMasjid = auth()->user()->id_masjid;
}

$kelas->update([
    'nama' => $request->nama,
    'id_masjid' => $idMasjid,
]);

    $kelas->update([
        'nama' => $request->nama,
        'id_masjid' => $request->id_masjid,
    ]);

    return redirect()
        ->route('kelas.index')
        ->with('success', 'Data kelas berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
if (auth()->user()->role == 'admin') {

    $kelas = Kelas::findOrFail($id);

} else {

    $kelas = Kelas::where(
        'id',
        $id
    )->where(
        'id_masjid',
        auth()->user()->id_masjid
    )->firstOrFail();
}

$kelas->delete();

    $kelas->delete();

    return redirect()
        ->route('kelas.index')
        ->with('success', 'Data kelas berhasil dihapus');
    }

}

