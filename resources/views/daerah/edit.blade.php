@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">


<h1 class="text-2xl font-bold mb-6">
    Edit Daerah
</h1>

<form action="{{ route('daerah.update', $daerah->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-4">

        <label class="block mb-2 font-medium">
            Nama Daerah
        </label>

        <input type="text"
               name="nama"
               value="{{ old('nama', $daerah->nama) }}"
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
                  class="w-full border rounded-lg p-2">{{ old('alamat', $daerah->alamat) }}</textarea>

        @error('alamat')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

    </div>

    <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
        Update
    </button>

    <a href="{{ route('daerah.index') }}"
       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
        Kembali
    </a>

</form>


</div>

@endsection
