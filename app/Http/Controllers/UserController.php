<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Masjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = User::with('masjid');

    if ($request->filled('search')) {

        $query->where(function ($q) use ($request) {

            $q->where(
                'name',
                'like',
                '%' . $request->search . '%'
            )
            ->orWhere(
                'username',
                'like',
                '%' . $request->search . '%'
            );

        });
    }

    $user = $query
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view(
        'user.index',
        compact('user')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $masjid = Masjid::orderBy('nama')->get();

    return view('user.create', compact('masjid'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
    'name' => 'required|max:255',
    'username' => 'required|unique:users,username',
    'role' => 'required|in:admin,user',
    'password' => 'required|min:6',
    ]);

    if (
    $request->role === 'user' &&
    empty($request->id_masjid)
) {
    return back()
        ->withErrors([
            'id_masjid' => 'Masjid wajib dipilih untuk role user.'
        ])
        ->withInput();
}

    User::create([
        'name' => $request->name,
        'username' => $request->username,
        'role' => $request->role,
        'id_masjid' => $request->id_masjid,
        'password' => Hash::make($request->password),
    ]);

    return redirect()
        ->route('user.index')
        ->with('success', 'User berhasil ditambahkan');
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
    $user = User::findOrFail($id);

    $masjid = Masjid::orderBy('nama')->get();

    return view('user.edit', compact(
        'user',
        'masjid'
    ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required|max:255',
        'username' => 'required|unique:users,username,' . $id,
        'role' => 'required',
    ]);

    $user->update([
        'name' => $request->name,
        'username' => $request->username,
        'role' => $request->role,
        'id_masjid' => $request->id_masjid,
    ]);

    if ($request->password) {

        $user->update([
            'password' => Hash::make($request->password)
        ]);

    }

    return redirect()
        ->route('user.index')
        ->with('success', 'User berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    User::findOrFail($id)->delete();

    return redirect()
        ->route('user.index')
        ->with('success', 'User berhasil dihapus');
    }
}
