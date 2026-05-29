@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">


<h1 class="text-2xl font-bold mb-6">
    Tambah Masjid
</h1>

<form action="{{ route('masjid.store') }}"
      method="POST">

    @csrf

    <div class="mb-4">

        <label class="block mb-2 font-medium">
            Nama Masjid
        </label>

        <input type="text"
               name="nama"
               value="{{ old('nama') }}"
               class="w-full border rounded-lg p-2">

        @error('nama')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

    </div>

    <div class="mb-4">

        <label class="block mb-2 font-medium">
            Alamat
        </label>

        <textarea name="alamat"
                  rows="4"
                  class="w-full border rounded-lg p-2">{{ old('alamat') }}</textarea>

        @error('alamat')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

    </div>

    <div class="mb-4">

        <label class="block mb-2 font-medium">
            Daerah
        </label>

        <select name="id_daerah"
                class="w-full border rounded-lg p-2">

            <option value="">
                Pilih Daerah
            </option>

            @foreach($daerah as $item)

                <option value="{{ $item->id }}">
                    {{ $item->nama }}
                </option>

            @endforeach

        </select>

        @error('id_daerah')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

    </div>

    <button type="submit"
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
        Simpan
    </button>

    <a href="{{ route('masjid.index') }}"
       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
        Kembali
    </a>

</form>


</div>

@endsection
