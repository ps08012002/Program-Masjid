<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Murid::with('kelas');

    // Role User hanya melihat murid masjid sendiri
    if (auth()->user()->role != 'admin') {

        $query->whereHas('kelas', function ($q) {

            $q->where(
                'id_masjid',
                auth()->user()->id_masjid
            );

        });
    }

    // Search Nama Murid
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

    $murid = $query
        ->paginate(10)
        ->withQueryString();

    // Dropdown kelas
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

    return view(
        'murid.index',
        compact(
            'murid',
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

    return view('murid.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required|max:255',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'id_kelas' => 'required|exists:tb_kelas,id',
    ]);

    $foto = null;

    if ($request->hasFile('foto')) {

        $foto = $request->file('foto')
            ->store('murid', 'public');

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

    Murid::create([
        'nama' => $request->nama,
        'foto' => $foto,
        'id_kelas' => $request->id_kelas,
    ]);

    return redirect()
        ->route('murid.index')
        ->with('success', 'Data murid berhasil ditambahkan');
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
        $murid = Murid::with('kelas')
    ->findOrFail($id);

if (
    auth()->user()->role != 'admin'
    &&
    $murid->kelas->id_masjid != auth()->user()->id_masjid
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

    return view('murid.edit', compact(
        'murid',
        'kelas'
    ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
$murid = Murid::with('kelas')
    ->findOrFail($id);

if (
    auth()->user()->role != 'admin'
    &&
    $murid->kelas->id_masjid != auth()->user()->id_masjid
) {
    abort(403);
}

    $request->validate([
        'nama' => 'required|max:255',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'id_kelas' => 'required|exists:tb_kelas,id',
    ]);

    if ($request->hasFile('foto')) {

        if ($murid->foto) {
            Storage::disk('public')->delete($murid->foto);
        }

        $murid->foto = $request->file('foto')
            ->store('murid', 'public');
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
    
    $murid->nama = $request->nama;
    $murid->id_kelas = $request->id_kelas;

    $murid->save();

    return redirect()
        ->route('murid.index')
        ->with('success', 'Data murid berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $murid = Murid::with('kelas')
    ->findOrFail($id);

    if ($murid->foto) {
        Storage::disk('public')->delete($murid->foto);
    }
    
    if (
    auth()->user()->role != 'admin'
    &&
    $murid->kelas->id_masjid != auth()->user()->id_masjid
) {
    abort(403);
}
    $murid->delete();

    return redirect()
        ->route('murid.index')
        ->with('success', 'Data murid berhasil dihapus');
    }
}
