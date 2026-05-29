@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-6">

    <h1 class="text-2xl font-bold">
        Data User
    </h1>

    <a href="{{ route('user.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
        Tambah User
    </a>

</div>

@if(session('success'))

<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
    {{ session('success') }}
</div>

@endif

<div class="bg-white shadow rounded-lg overflow-hidden">

    <table class="min-w-full">

        <thead class="bg-gray-100">

            <tr>
                <th class="px-6 py-3 text-left">No</th>
                <th class="px-6 py-3 text-left">Nama</th>
                <th class="px-6 py-3 text-left">Username</th>
                <th class="px-6 py-3 text-left">Role</th>
                <th class="px-6 py-3 text-left">Masjid</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>

        </thead>

        <tbody>

            @forelse($user as $item)

            <tr class="border-b">

                <td class="px-6 py-4">
                    {{ $loop->iteration }}
                </td>

                <td class="px-6 py-4">
                    {{ $item->name }}
                </td>

                <td class="px-6 py-4">
                    {{ $item->username }}
                </td>

                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded bg-gray-200">
                        {{ ucfirst($item->role) }}
                    </span>
                </td>

                <td class="px-6 py-4">
                    {{ $item->masjid->nama ?? '-' }}
                </td>

                <td class="px-6 py-4 text-center">

                    <a href="{{ route('user.edit', $item->id) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded">
                        Edit
                    </a>

                    <form action="{{ route('user.destroy', $item->id) }}"
                          method="POST"
                          class="inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                onclick="return confirm('Yakin ingin menghapus user ini?')"
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="6" class="text-center py-4">
                    Data user belum tersedia
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

<div class="mt-4">
    {{ $user->links() }}
</div>

@endsection