<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masjid;
use App\Models\Daerah;

class MasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $masjid = Masjid::with('daerah')
        ->latest()
        ->paginate(10);

    return view('masjid.index', compact('masjid'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $daerah = Daerah::orderBy('nama')->get();

    return view('masjid.create', compact('daerah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
        'nama' => 'required|max:255',
        'alamat' => 'required',
        'id_daerah' => 'required|exists:tb_daerah,id',
    ]);

    Masjid::create([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'id_daerah' => $request->id_daerah,
    ]);

    return redirect()
        ->route('masjid.index')
        ->with('success', 'Data masjid berhasil ditambahkan');
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
            $masjid = Masjid::findOrFail($id);

    $daerah = Daerah::orderBy('nama')->get();

    return view('masjid.edit', compact(
        'masjid',
        'daerah'
    ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
           $request->validate([
        'nama' => 'required|max:255',
        'alamat' => 'required',
        'id_daerah' => 'required|exists:tb_daerah,id',
    ]);

    $masjid = Masjid::findOrFail($id);

    $masjid->update([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'id_daerah' => $request->id_daerah,
    ]);

    return redirect()
        ->route('masjid.index')
        ->with('success', 'Data masjid berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $masjid = Masjid::findOrFail($id);

    $masjid->delete();

    return redirect()
        ->route('masjid.index')
        ->with('success', 'Data masjid berhasil dihapus');
    }
}
