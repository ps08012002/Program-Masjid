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
    public function index(Request $request)
{
    $query = Kelas::with('masjid');

    // Role User hanya melihat masjid sendiri
    if (auth()->user()->role != 'admin') {

        $query->where(
            'id_masjid',
            auth()->user()->id_masjid
        );
    }

    // Search
    if ($request->filled('search')) {

        $query->where(
            'nama',
            'like',
            '%' . $request->search . '%'
        );
    }

    // Filter Masjid
    if (
        auth()->user()->role == 'admin'
        &&
        $request->filled('masjid')
    ) {

        $query->where(
            'id_masjid',
            $request->masjid
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

    $kelas = $query
        ->paginate(10)
        ->withQueryString();

    $masjid = Masjid::orderBy('nama')->get();

    return view(
        'kelas.index',
        compact(
            'kelas',
            'masjid'
        )
    );
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

    return redirect()
        ->route('kelas.index')
        ->with('success', 'Data kelas berhasil dihapus');
    }

}

