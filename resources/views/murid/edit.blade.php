@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">


<h1 class="text-2xl font-bold mb-6">
    Edit Murid
</h1>

<form action="{{ route('murid.update', $murid->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-4">

        <label class="block mb-2 font-medium">
            Nama Murid
        </label>

        <input type="text"
               name="nama"
               value="{{ old('nama', $murid->nama) }}"
               class="w-full border rounded-lg p-2">

    </div>

    <div class="mb-4">

        <label class="block mb-2 font-medium">
            Kelas
        </label>

        <select name="id_kelas"
                class="w-full border rounded-lg p-2">

            @foreach($kelas as $item)

                <option value="{{ $item->id }}"
                    {{ $murid->id_kelas == $item->id ? 'selected' : '' }}>
                    {{ $item->nama }}
                </option>

            @endforeach

        </select>

    </div>

    @if($murid->foto)

    <div class="mb-4">

        <img src="{{ asset('storage/' . $murid->foto) }}"
             class="w-32 rounded">

    </div>

    @endif

    <div class="mb-4">

        <label class="block mb-2 font-medium">
            Ganti Foto
        </label>

        <input type="file"
               name="foto"
               class="w-full border rounded-lg p-2">

    </div>

    <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg">
        Update
    </button>

    <a href="{{ route('murid.index') }}"
       class="bg-gray-500 text-white px-4 py-2 rounded-lg">
        Kembali
    </a>

</form>


</div>

@endsection
