@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">


<h1 class="text-2xl font-bold mb-6">
    Tambah Murid
</h1>

<form action="{{ route('murid.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="mb-4">

        <label class="block mb-2 font-medium">
            Nama Murid
        </label>

        <input type="text"
               name="nama"
               value="{{ old('nama') }}"
               class="w-full border rounded-lg p-2">

    </div>

    <div class="mb-4">

        <label class="block mb-2 font-medium">
            Kelas
        </label>

        <select name="id_kelas"
                class="w-full border rounded-lg p-2">

            <option value="">
                Pilih Kelas
            </option>

            @foreach($kelas as $item)

                <option value="{{ $item->id }}">
                    {{ $item->nama }}
                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-4">

        <label class="block mb-2 font-medium">
            Foto
        </label>
        <input type="file"
        name="foto"
        class="w-full border rounded-lg p-2">
        <h4 class="text-sm text-gray-500 mb-2">
            Max 2MB
        </h4>
        
    </div>

    <button type="submit"
            class="bg-green-600 text-white px-4 py-2 rounded-lg">
        Simpan
    </button>

    <a href="{{ route('murid.index') }}"
       class="bg-gray-500 text-white px-4 py-2 rounded-lg">
        Kembali
    </a>

</form>


</div>

@endsection
