@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">


<h1 class="text-2xl font-bold mb-6">
    Edit Masjid
</h1>

<form action="{{ route('masjid.update', $masjid->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-4">

        <label class="block mb-2 font-medium">
            Nama Masjid
        </label>

        <input type="text"
               name="nama"
               value="{{ old('nama', $masjid->nama) }}"
               class="w-full border rounded-lg p-2">

    </div>

    <div class="mb-4">

        <label class="block mb-2 font-medium">
            Alamat
        </label>

        <textarea name="alamat"
                  rows="4"
                  class="w-full border rounded-lg p-2">{{ old('alamat', $masjid->alamat) }}</textarea>

    </div>

    <div class="mb-4">

        <label class="block mb-2 font-medium">
            Daerah
        </label>

        <select name="id_daerah"
                class="w-full border rounded-lg p-2">

            @foreach($daerah as $item)

                <option value="{{ $item->id }}"
                    {{ $masjid->id_daerah == $item->id ? 'selected' : '' }}>

                    {{ $item->nama }}

                </option>

            @endforeach

        </select>

    </div>

    <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
        Update
    </button>

    <a href="{{ route('masjid.index') }}"
       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
        Kembali
    </a>

</form>


</div>

@endsection
