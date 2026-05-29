<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaerahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daerah = \App\Models\Daerah::latest()->paginate(10);

        return view('daerah.index', compact('daerah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('daerah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
        'nama' => 'required|max:255',
        'alamat' => 'required',
    ]);

    \App\Models\Daerah::create([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
    ]);

    return redirect()
        ->route('daerah.index')
        ->with('success', 'Data daerah berhasil ditambahkan');
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
        $daerah = \App\Models\Daerah::findOrFail($id);

        return view('daerah.edit', compact('daerah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $request->validate([
        'nama' => 'required|max:255',
        'alamat' => 'required',
    ]);

    $daerah = \App\Models\Daerah::findOrFail($id);

    $daerah->update([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
    ]);

    return redirect()
        ->route('daerah.index')
        ->with('success', 'Data daerah berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $daerah = \App\Models\Daerah::findOrFail($id);

    $daerah->delete();

    return redirect()
        ->route('daerah.index')
        ->with('success', 'Data daerah berhasil dihapus');
    }
}
