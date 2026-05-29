@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-6">


<h1 class="text-2xl font-bold">
    Data Kelas
</h1>

<a href="{{ route('kelas.create') }}"
   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
    Tambah Kelas
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
            <th class="px-6 py-3 text-left">Nama Kelas</th>
            <th class="px-6 py-3 text-left">Masjid</th>
            <th class="px-6 py-3 text-center">Aksi</th>
        </tr>

    </thead>

    <tbody>

        @forelse($kelas as $item)

        <tr class="border-b">

            <td class="px-6 py-4">
                {{ $loop->iteration }}
            </td>

            <td class="px-6 py-4">
                {{ $item->nama }}
            </td>

            <td class="px-6 py-4">
                {{ $item->masjid->nama }}
            </td>

            <td class="px-6 py-4 text-center">

                <a href="{{ route('kelas.edit', $item->id) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded">
                    Edit
                </a>

                <form action="{{ route('kelas.destroy', $item->id) }}"
                      method="POST"
                      class="inline">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            onclick="return confirm('Yakin ingin menghapus data ini?')"
                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">
                        Hapus
                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="4" class="text-center py-4">
                Data kelas belum tersedia
            </td>
        </tr>

        @endforelse

    </tbody>

</table>


</div>

<div class="mt-4">
    {{ $kelas->links() }}
</div>

@endsection
