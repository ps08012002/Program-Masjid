@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <h1 class="text-2xl font-bold mb-6">
        Tambah User
    </h1>

    <form action="{{ route('user.store') }}"
          method="POST">

        @csrf

        <div class="mb-4">

            <label class="block mb-2">
                Nama
            </label>

            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   class="w-full border rounded-lg p-2">

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Username
            </label>

            <input type="text"
                   name="username"
                   value="{{ old('username') }}"
                   class="w-full border rounded-lg p-2">

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Password
            </label>

            <input type="password"
                   name="password"
                   class="w-full border rounded-lg p-2">

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Role
            </label>

            <select name="role"
                    class="w-full border rounded-lg p-2">

                <option value="user">
                    User
                </option>

                <option value="admin">
                    Admin
                </option>

            </select>

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Masjid
            </label>

            <select name="id_masjid"
                    class="w-full border rounded-lg p-2">

                <option value="">
                    Pilih Masjid
                </option>

                @foreach($masjid as $item)

                    <option value="{{ $item->id }}">
                        {{ $item->nama }}
                    </option>

                @endforeach

            </select>

        </div>

        <button type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded-lg">
            Simpan
        </button>

        <a href="{{ route('user.index') }}"
           class="bg-gray-500 text-white px-4 py-2 rounded-lg">
            Kembali
        </a>

    </form>

</div>

@endsection