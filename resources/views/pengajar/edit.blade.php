@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">


<h1 class="text-2xl font-bold mb-6">
    Edit Pengajar
</h1>

<form action="{{ route('pengajar.update', $pengajar->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-4">

        <label class="block mb-2 font-medium">
            Nama Pengajar
        </label>

        <input type="text"
               name="nama"
               value="{{ old('nama', $pengajar->nama) }}"
               class="w-full border rounded-lg p-2">

        @error('nama')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

    </div>

    <div class="mb-4">

        <label class="block mb-2 font-medium">
            Nomer Telepon
        </label>

        <input type="text"
               name="nomer_tlpn"
               value="{{ old('nomer_tlpn', $pengajar->nomer_tlpn) }}"
               class="w-full border rounded-lg p-2">

        @error('nomer_tlpn')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

    </div>

    <div class="mb-4">

        <label class="block mb-2 font-medium">
            Kelas
        </label>

        <select name="id_kelas"
                class="w-full border rounded-lg p-2">

            @foreach($kelas as $item)

                <option value="{{ $item->id }}"
                    {{ $pengajar->id_kelas == $item->id ? 'selected' : '' }}>

                    {{ $item->nama }}

                </option>

            @endforeach

        </select>

        @error('id_kelas')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

    </div>

    <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
        Update
    </button>

    <a href="{{ route('pengajar.index') }}"
       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
        Kembali
    </a>

</form>


</div>

@endsection
